/**
 * A couple of nice features for input[type=range] 
 * - until it's supported with CSS in all browsers
 *
 * You can change the colors of the input from your child theme with
 * App.plugins.InputRangeUtils.rangeLeftColor = 'red'; for example
 */
App.plugins.InputRangeUtils = {
	rangeLeftColor: '#06c', 
	rangeRightColor: '#333', 

	// Init
	init: function () {
		this.values();
		this.colors();
	}, 

	// Appends a span to the label containing the value of the range input
	// Can be prefixed or suffixed by adding a data-value-prefix="$" or data-value-suffix=" years" for example
	values: function () {
		var inputs = document.querySelectorAll('input[type=range]');

		for (var i = 0; i < inputs.length; i++) {
			(function () {
				var input	= inputs[i];
				var label	= document.querySelector('label[for="' + input.id + '"]');
				var prefix	= input.getAttribute('data-value-prefix') ? input.getAttribute('data-value-prefix') : '';
				var suffix	= input.getAttribute('data-value-suffix') ? input.getAttribute('data-value-suffix') : '';
				var value	= document.createElement('span');

				value.classList.add('value');
				label.appendChild(value);

				var updateValue = function () {
					var niceVal = typeof(number_format) == 'undefined' ? input.value : number_format(input.value, 0, ',', ' ');

					value.innerHTML = prefix + niceVal + suffix;
				};

				updateValue();

				input.addEventListener('input', updateValue);
				input.addEventListener('change', updateValue);
			})();
		}
	}, 

	// Gives the left and right side of the input different colors (done with CSS for IE11)
	colors: function () {
		var self = this;
		var inputs = document.querySelectorAll('input[type=range]');

		for (var i = 0; i < inputs.length; i++) {
			(function () {
				var input = inputs[i];

				var updateColor = function () {
					var val = (input.value - input.getAttribute('min')) / (input.getAttribute('max') - input.getAttribute('min'));
						val *= 100;
console.log(self.rangeRightColor);
					input.style.backgroundImage = 'linear-gradient(90deg, ' + self.rangeLeftColor + ' 0%, ' + self.rangeLeftColor + ' ' + val + '%, ' + self.rangeRightColor + ' ' + val + '%, ' + self.rangeRightColor + ' 100%)';
				};

				updateColor();

				input.addEventListener('input', updateColor);
				input.addEventListener('change', updateColor);
			})();
		}
	}
};
