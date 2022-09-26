<?php

namespace lib;

use Throwable;

use model\AbstractModel;
use model\UserModel;

class Massage extends AbstractModel {
	protected static $SESSION_NAME = '_message';
	public const INFO = 'info';
	public const ERROR = 'error';
	public const DEBUG = 'debug';

	public static function push($type, $message) {
		if (!is_array(static::getSession())) {
			static::init();
		}

		$messages = static::getSession();
		$messages[$type][] = $message;
		static::setSession($messages);
	}

	public static function flush() {
		try {
			$messages_with_type = static::getSessionAndFlush() ?? [];
			if ($messages_with_type) {
				echo '<div class="g-message">';
				echo '<ul>';

				foreach ($messages_with_type as $type => $messages) {
					if ($type === static::DEBUG && !DEBUG) {
						continue;
					}

					$className = $type === static::INFO ? 'is-message_info' : 'is-message_error';

					foreach ($messages as $message) {
						echo "<li class='is-type_{$type}'>{$message}</li>";
					}
				}

				echo '</ul>';
				echo '</div>';
			}
		} catch (Throwable $e) {
			UserModel::clearSession();
			Massage::push(Massage::DEBUG, $e->getMessage());
			Massage::push(Massage::ERROR, 'Massage::flushでエラーが発生しました。');
		}
	}

	private static function init() {
		static::setSession([
			static::INFO => [],
			static::ERROR => [],
			static::DEBUG => [],
		]);
	}
}
