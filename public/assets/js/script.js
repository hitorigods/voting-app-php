/**
 * Validate
 */
const Validate = {
	selector: {
		element: '.js-validate',
		target: '.js-validate_target',
		error: '.js-validate_error',
	},
	class: {
		valid: 'is-validate_valid',
		invalid: 'is-validate_invalid',
	},
	attr: {},
	init: () => {
		$targets = document.querySelectorAll(Validate.selector.target);
		if (!$targets) {
			return;
		}
		$targets.forEach(($target) => {
			$target.addEventListener('input', (event) => {
				const $input = event.currentTarget;
				const $error = $input.parentElement.querySelector(
					Validate.selector.error
				);

				$elements = document.querySelectorAll(Validate.selector.element);
				if (!$elements) {
					return;
				}
				$elements.forEach(($element) => {
					Validate.submit($element);
				});

				if (!$error) {
					return;
				}

				if ($input.checkValidity()) {
					$input.classList.add(Validate.class.valid);
					$input.classList.remove(Validate.class.invalid);

					$error.textContent = '';
				} else {
					$input.classList.remove(Validate.class.valid);
					$input.classList.add(Validate.class.invalid);

					if ($input.validity.valueMissing) {
						$error.textContent = '値の入力が必須です。';
					} else if ($input.validity.tooShort) {
						$error.textContent = `${$input.minLength}文字以上で入力してください。現在の文字数は${$input.value.length}です。`;
					} else if ($input.validity.tooLong) {
						$error.textContent = `${$input.maxLength}文字以下で入力してください。現在の文字数は${$input.value.length}です。`;
					} else if ($input.validity.patternMismatch) {
						$error.textContent = '半角英数字で入力してください。';
					} else {
					}
				}

				const $element = $input.closest(Validate.selector.element);
				Validate.submit($element);
			});
		});
	},
	submit: ($element) => {
		const $submit = $element.querySelector('[type="submit"]');

		if ($element.checkValidity()) {
			$element.classList.add(Validate.class.valid);
			$element.classList.remove(Validate.class.invalid);
			$submit.removeAttribute('disabled');
		} else {
			$element.classList.remove(Validate.class.valid);
			$element.classList.add(Validate.class.invalid);
			$submit.setAttribute('disabled', true);
		}
	},
};
Validate.init();
