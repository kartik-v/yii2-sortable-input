/*!
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @version 1.0.0
 *
 * JQuery Plugin for yii2-sortable-input.
 * 
 * Author: Kartik Visweswaran
 * Copyright: 2014, Kartik Visweswaran, Krajee.com
 * For more JQuery plugins visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */
(function ($) {
    var isEmpty = function (value, trim) {
        return value === null || value === undefined || value == []
            || value === '' || trim && $.trim(value) === '';
    };

    var SortableInput = function (element, options) {
        this.$element = $(element);
        this.$sortableEl = $('#' + options.sortableId);
        this.init();
        this.listen();
    };

    SortableInput.prototype = {
        constructor: SortableInput,
        init: function () {
            var self = this, $form = self.$form;
            self.$form = self.$element.closest('form');
            self.delimiter = options.delimiter;
            self.initialValue = self.getKeys();
            self.initialContent = self.$sortableEl.html();
            self.$element.val(self.initialValue);
        },
        listen: function () {
            var self = this;
            self.$sortableEl.on('sortupdate', function () {
                self.$element.val(self.getKeys());
                self.$element.trigger('change');
            });
            self.$form.on('reset', function () {
                self.$sortableEl.html(self.initialContent);
                self.$element.val(self.initialValue);
            });
        },
        getKeys: function () {
            var self = this;
            return self.$sortableEl.find('li').map(function (i, n) {
                return $(n).data('key');
            }).get().join(self.delimiter);

        },
    };

    // sortableInput plugin definition
    $.fn.sortableInput = function (option) {
        var args = Array.apply(null, arguments);
        args.shift();
        return this.each(function () {
            var $this = $(this),
                data = $this.data('sortableInput'),
                options = typeof option === 'object' && option;

            if (!data) {
                $this.data('sortableInput', (data = new SortableInput(this, $.extend({}, $.fn.sortableInput.defaults, options, $(this).data()))));
            }

            if (typeof option === 'string') {
                data[option].apply(data, args);
            }
        });
    };

    $.fn.sortableInput.defaults = {
        sortableId: '',
        delimiter: ','
    };
}(jQuery));