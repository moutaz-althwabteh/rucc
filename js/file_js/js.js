var hiddenModals = [];
var log = console.log;

var getBaseUrl = function(link){
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    if(link){
        return baseUrl+'/'+link;
    }else{
        return baseUrl;
    }
}
var Util = function () {
    return {

        init: function () {
            Util.initComponents();
            Util.clearForm();
            Util.stackModal();

        },
        clearValidation : function(formElement){
            //Internal $.validator is exposed through $(form).validate()
            var validator = $(formElement).validate();
            //Iterate through named elements inside of the form, and mark them as error free
            $('[name]',formElement).each(function(){
            validator.successList.push(this);//mark as error free
            validator.showErrors();//remove error messages if present
            });
            validator.resetForm();//remove error class on name elements and clear history
            validator.reset();//remove all error and success data
        },
        Confirm: function (func) {
            swal({
                title: "Confirmation",
                text: "Are You Sure!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3598dc',
                cancelButtonColor: '#ed6b75',
                confirmButtonText: 'yes   ',
                cancelButtonText: "cancel",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    func();
                    return true;
                } else {
                    return false;

                };
            });
        },
        clearForm: function () {
            $('[data-toggle="clearform"]').on('click', function (e) {
                e.preventDefault();
                var form = $(this).data('target');
                $(form).find('input, select').val('');

                return false;
            })
        },
        serialize: function (elem, o) {
            var inputs = $(elem).find('input, select');
            var arr = [];
            $.each(inputs,function (i, e) {
                log(o);
                if (o == 'true') {
                    var p = $.param($(e));
                    arr.push(p.slice(p.lastIndexOf('.') + 1, p.length));
                } else {
                    arr.push($.param($(e)));
                }
            });
            return arr.join('&');
        },
        stackModal: function () {
            $('[data-toggle="stack-modal"]').on('click', function (e) {
                e.preventDefault();
                var modal = $(this).data('target');
                var parentModal = $(this).closest('.modal.fade');
                hiddenModals.push(parentModal);
                $(parentModal).modal('hide');
                $(modal).modal('show');

                $(modal).on('hidden.bs.modal', function () {
                    var parentModal = hiddenModals.pop();
                    $(parentModal).modal('show');
                });

                return false;
            })
        },
        bindInputs: function (elem, obj, prefix) {

            if (prefix != '') {
                prefix = prefix + '_';
            }
             log(Object.getOwnPropertyNames(obj));
            if (Object.getOwnPropertyNames(obj).length === 0) {

                $(elem).find('input, select').val('');
            } else {
                for (var property in obj) {

                    if (obj.hasOwnProperty(property)) {
                        if (typeof obj[property] == "object" && obj[property] != null) {
                            this.bindInputs(obj[property], property);
                        } else {

                            log('obj',obj);
                            if (obj[property] == 'null') {
                                continue; // skip value if it equals null
                            }

                            var target = $(elem).find('#' + prefix + property);

                            if (target.is('img')) {
                                if (obj[property] == null) {
                                    //  console.log('empty img');
                                    // target.attr('src', '/Content/assets/img/no-pi-placeholder.png');
                                } else {
                                    target.attr('src', obj[property]);
                                }

                            } else {
                                if (target.is('select')) {

                                    target.val(obj[property]).trigger('change');
                                }
                                if (target.attr('type') == 'radio'){
                                    $(target).find('input').prop(obj[property]);
                                }
                                if (target.attr('type') == 'checkbox') {
                                    var checked = false;
                                    if (obj[property]) {
                                        checked = true;
                                        $(target).closest('.checker').find('span').addClass('checked');
                                    } else {
                                        $(target).closest('.checker').find('span').removeClass('checked');
                                    }
                                    target.prop('checked', checked);
                                    var targetName = $(target).attr('name');
                                    log('name', targetName);
                                    var hiddenChecbox = $(target).closest('.checker').next('input[name="' + targetName + '"]');
                                    hiddenChecbox.val(checked);
                                    $(target).trigger('change');
                                    $(hiddenChecbox).trigger('change');
                                    /* if (check == true) {
                                         //$('.checker').find('span').addClass('checked');
                                         $('.checkbox').prop('checked', true);
                                     } else {
                                         $('.checker').find('span').removeClass('checked');
                                         $('.checkbox').prop('checked', false);
                                     }*/

                                }
                                if ($(target).is('label')) {
                                    if (obj[property] != null) {
                                        $(target).text(obj[property]);
                                    }

                                }
                                var regex = /(<([^>]+)>)/ig
                                var prop = obj[property]+'';
                                $(target).val(prop.replace(regex, " | "));
                            }
                        }
                    }
                }
            }


           /* for (var prop in object) {
                if (object.hasOwnProperty(prop)) {
                    log('#' + prop);
                    log(object[prop]);
                    $(elem).find('#' + prop).val(object[prop]);
                }

            }*/
        },

         initComponents: function () {
        //     $('.date').datepicker({
        //         format: "dd-mm-yyyy",
        //         todayHighlight: true,
        //         "setDate": new Date()
        //     });
        //     $('.date').on('changeDate', function (ev) {
        //         $(this).datepicker('hide');
        //     });
            $(document).on('change', '.checker > span > input', function () {
                var name = $(this).attr('name');
                var checked = $(this).is(':checked');
                $(this).closest('.checker').next('input[name="' + name + '"]').val(checked);

            });
            $(document).on('click', '[data-toggle="modal"]', function (e) {
                e.preventDefault();
                var modal = $(this).data('target');
                $(modal).modal('show');

                return false;
            });




            $('[data-modaltite]').on('shown.bs.modal', function (e) {
                log(e);
                log(f);
            });

            $('[data-resetmodal="true"]').on('hidden.bs.modal', function () {
                $(this).find('input, select').val('');
                $(this).find('.custom-summary').html('');
            });


            $('input[type="checkbox"]').on('change', function () {

                $(this).val()
               //$(this).is('checked')
            });
            $(document).on('submit', '[data-toggle="ajaxrepform"]', function (e) {
                e.preventDefault();
                //if()
                //log(e);

                var form = $(this);
                form.find('.custom-summary').html('');

                var id = $(this).attr('id');
                var action = $(this).attr('action');
                var method = $(this).attr('method');
                var extraVals = $(this).data('extravals') || '';
                var acallback = $(this).data('acallback') || '';
                var required = $(this).data('required'); // to be deleted
                var realvals = extraVals.split(',');
                var serialzeArr = [];
                var serialized = '';
                var lastparam = $(this).data('lastparam') || false;
                $.each(realvals, function (i, e) {
                    if (lastparam) {
                        var p = $.param($(e));
                        serialzeArr.push(p.slice(p.lastIndexOf('.') + 1, p.length));
                    } else {
                        serialzeArr.push($.param($(e)));
                    }

                });


                if (serialzeArr.length == 0) {
                    serialized = $(this).serialize();
                } else {
                    serialized = serialzeArr.join('&') + '&' + $(this).serialize();
                }
                try {
                    App.blockUI({
                        target: '#' + id
                    })
                    $[method](action, serialized)
                    .done(function (data) {
                        if (data) {
                            if (data.hasOwnProperty("validationError")) {
                                form.find('.custom-summary').html('');
                                form.find('.custom-summary').html(data.validationMessage);
                                form.find('.custom-summary').goto('-30', 2000);
                            }
                            if (data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                                m.toast(data);
                            }
                            cb = eval(acallback);
                            if (typeof cb === 'function') {
                                cb(data, form);
                            }
                            if (data.hasOwnProperty("ReportStatus") && data.ReportStatus == "ok") {
                                window.open(data.url);
                            }



                        } else {
                            log('');
                        }


                    })
                    .fail(function () {

                    })
                    .always(function () {
                     //   App.unblockUI(
                        //    '#' + id
                      //  )
                    });
                } catch (err) {
                    log(err);
                   // App.unblockUI(
                          //  '#' + id
                     //   )
                } finally {

                }
                return false;
            })



            $(document).on('submit', '[data-toggle="ajaxform"]', function (e) {
                e.preventDefault();

                //if()
                //log(e);

                var form = $(this);
                form.find('.custom-summary').html('');

                var id = $(this).attr('id');
                var action = $(this).attr('action');
                var method = $(this).attr('method');
                var extraVals = $(this).data('extravals') || '';
                var acallback = $(this).data('acallback') || '';
                var bcallback = $(this).data('bcallback') || '';
                var realvals = extraVals.split(',');
                var serialzeArr = [];
                var serialized = '';
                var lastparam = $(this).data('lastparam') || false;
                $.each(realvals, function (i, e) {
                    if (lastparam) {
                        var p = $.param($(e));
                        serialzeArr.push(p.slice(p.lastIndexOf('.')+1, p.length));
                    } else {
                        serialzeArr.push($.param($(e)));
                    }

                });

                bcb = eval(bcallback)
                if (typeof bcb === 'function') {
                    bcb(serialzeArr, form);
                }
                if (serialzeArr.length == 0) {
                    serialized = $(this).serialize();
                }else{
                    serialized = serialzeArr.join('&') + '&' + $(this).serialize();
                }
                try {
                    log('start');
                    App.blockUI({
                        target: '#' + id
                    })

                    log('end');
                    $[method](action, serialized)
                    .done(function (data) {
                        if (data.hasOwnProperty("validationError")) {
                            form.find('.custom-summary').html('');
                            form.find('.custom-summary').html(data.validationMessage);
                            form.find('.custom-summary').goto('-30', 2000);
                        }
                        if (data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                            m.toast(data);

                            // this a custom code for item add
                            if (data.status > 0) {
                                var formID = $(form).attr('id');
                                if (formID == 'AddItemForm') {
                                    if (!$(form).hasClass('stay'))
                                    $(form).find('[data-toggle="clearform"]').trigger('click');
                                }
                            }
                        }


                        cb = eval(acallback);
                        if (typeof cb === 'function') {
                            cb(data, form);
                        }




                    })
                    .fail(function () {

                    })
                    .always(function () {
                      //  App.unblockUI(
                         //   '#' + id
                        //)

                        try{
                            var chkfrm = eval('checkForm');
                            if (typeof chkfrm === 'function') {
                                chkfrm();
                            }
                        } catch (e) {

                        }

                    });
                } catch (err) {
                    //log(err);
                  //  App.unblockUI(
                        //    '#' + id
                       // )
                } finally {

                }
                return false;
            })


        }

    }
}();

$.fn.CheckBoxList = function (options) {
    var _this = $(this);
    var rem = $(_this).find('.CheckBoxList');
    $(rem).remove();
    var data = options.data || {};
    var cbname = options.name || 'cbName';
    var containerClass = options.containerClass || '';
    var arr = [];
    _this.append('<div class="CheckBoxList" style="display:none;"></div>');
    var container = $(_this).find('.CheckBoxList');

    log('data', data);
    $.each(data, function (i, e) {
        e.parent = e.parent == "#" ? '0' : e.parent;
        var checked = '';
        if (e.state != null) {
            checked = e.state.selected ? 'checked' : '';
        }
        //var cont = document.createElement('<div id="' + e.id + '" class="cb-tree-container"><div class="cb-tree-entry"><input type="checkbox" id="' + e.id + '" parent="' + e.parent + '" name="' + cbname + '[]"  ' + checked + '/> ' + e.text + '</div></div>');
        var cont = $('<div id="' + e.id + '" class="cb-tree-container"><div class="cb-tree-entry"><input type="checkbox" id="' + e.id + '" data-parent="' + e.parent + '" name="' + cbname + '[]"  ' + checked + '/> ' + e.text + '</div></div>');
        //if (WrapperClass != '') {
        //    log('wrapped');
        //    $(container).append($(cont).wrap('span'));
        //} else {
        //    $(container).append($(cont));
        //}

        $(container).append($(cont));


    });
    var loop = function (d) {
        var e = d.shift();
        e.parent = e.parent == "#" ? '0' : e.parent;
        if (e) {
            var curContainer = $(container).find('#' + e.parent);
            if (curContainer.length == 1) {
                $(curContainer).append($(container).find('#' + e.id));
                $(curContainer).data('hasChildren', 'true');




            }
        }

        if (data.length == 0) {
            return;
        } else {
            loop(d);
        }
    }

    loop(data);


    //var updateLevel = function (elements, level) {

    //    $.each(elements, function (i, e) {
    //        $(e).data(data('hasChildren'))
    //    })
    //    if ($(element).data('hasChildren')) {
    //        $(element).data('level', level);
    //    } else {
    //        return;
    //    }


    //    var containers = $(element).find('> .cb-tree-container');
    //    if (containers.length > 0) {



    //    }
    //}

 //   $(container).find('> .cb-tree-container').addClass(containerClass).append('<hr/>');
   // $(container).find('.cb-tree-container  > .cb-tree-entry').addClass('font-blue bold');
    var containers = $(container).find('.cb-tree-container');

    $(container).find('> .cb-tree-container').addClass(containerClass).append('<div class="clearfix"></div>');
    $(container).find('> .cb-tree-container').data('level', '0');
    $(container).find('> .cb-tree-container').css({ "border": "1px solid #eee", "marginTop": "10px", "marginBottom": "10px", "paddingTop": "10px", "paddingBottom": "10px" });
    // style parents
    var index = 0;
    $.each(containers, function (i, e) {
        if ($(e).data('hasChildren')) {
            $(e).find('> .cb-tree-entry').addClass('font-blue bold');
            if ($(e).parent().data('level') == '0') {
                $(e).addClass('col-xs-4');
                if (index % 3 == 0) {
                    $(e).after('<div class="clearfix"></div>');
                }
            } else {
                $(e).addClass(containerClass)
            }
            index++;

        }
    });



    // bubble sort
    var c = $(container).find('> .cb-tree-container');
    var l = c.length;
    var k = 0;
    for (var i = l - 1; i >= 0 ; i--) {
        for (var j = 1; j <= i; j++) {
            var length1 = $(container).find('> .cb-tree-container').eq(j).find('.cb-tree-container').length;
            var length2 = $(container).find('> .cb-tree-container').eq(j - 1).find('.cb-tree-container').length;
            if (length2 < length1) {
                $(container).find('> .cb-tree-container').eq(j - 1).before($(container).find('> .cb-tree-container').eq(j));
            }
        }
    }
    $(container).removeAttr('style');


    // $(container).find('.cb-tree-container  > .cb-tree-entry > input').on('change', function (e) {
    //
    //     if ($(this).parent().parent().data('hasChildren')) {
    //
    //         if ($(this).is(':checked')) {
    //
    //             $(this).parent().parent().find('.cb-tree-container > .cb-tree-entry > input').prop('checked', true);
    //
    //
    //         } else {
    //             $(this).parent().parent().find('.cb-tree-container > .cb-tree-entry > input').prop('checked', false);
    //         }
    //     }
    //
    // })
    //if (data.length > 0) {
    //    $.each(data, function (i, e) {
    //        if (e.parent == '#') {
    //            var checked = '';
    //            if (e.state != null) {
    //                checked = e.state.selected? 'checked': '';
    //            }
    //            $(_this).append('<div id="' + e.id + '" class=""><div class="cb-tree-parent"><input type="checkbox" id="' + e.id + '" parent="' + e.parent + '" name="' + cbname + '[]"  ' + checked + '/> ' + e.text + '</div></div>');
    //        }
    //    });

    //    $.each(data, function (i, e) {
    //        if (e.parent != '#') {
    //            var checked = '';
    //            if (e.state != null) {
    //                checked = e.state.selected ? 'checked' : '';
    //            }

    //        }
    //    });
    //}
}
$.fn.searchable = function (options) {
    var _this = $(this);
    options = options || {};
    options.value = options.value || 'id';
    options.text = options.text || 'text';
    options.src = options.src || 'data';
    resultobjects = [];
    $(_this).wrap('<div class="searchable">');
    $(_this).parent('.searchable').append('<div class="search-result hidden"></div>');
    var searchResult = $(_this).parent('.searchable').find('.search-result');
    var items = [];
    var result = '';

    /*$(_this).on('blur', function () {
        $(searchResult).addClass('hidden');
    });*/

   //$(_this).on('focus', function () {
   //     $(this).trigger('keyup');
   // });

    $(window).on('click', function () {
        $(searchResult).addClass('hidden');
    });
    $(_this).on('keyup', function () {
        if ($(this).val().length >= options.startWithLength) {

            $.get(options.url + '?query=' + $(this).val())
                .done(function (data) {
                    //log(data);
                    //data = JSON.parse(data);

                    $.each(data[options.src], function (i, e) {
                        log(options.e);
                        log(options.text);
                        log(options.value);
                        resultobjects.push(e);
                        items.push('<li class="jz-list-item" data-id=' + e[options.value] + ' data-name="' + e[options.text] + '">' + e[options.text] + '</li>');
                    });

                    result = '<ul class="jz-result-list">' + items.join('') + '</ul>';
                    items = [];
                    $(searchResult).empty();
                    $(searchResult).html(result);
                    $(searchResult).removeClass('hidden');
                })
                .fail(function () {

                })
                .always(function () {
                    $('.searchable').on('click', function (e) {
                        e.stopPropagation();
                    });
                    $('li.jz-list-item').on('click', function () {
                        var id = $(this).data('id');
                        $('#' + options.targetID).val(id);
                        $(_this).val($(this).data('name'));
                    });
                });

        }
    });


    //$(_this).parent().find('.search-result').css({ "top": height*2 });
    return _this;

}

$.fn.goto = function (margin,speed) {
    _this = this;
    margin = margin || 0;
    var offset = 0;

    if (margin == 0) {
        offset = _this.offset().top
    } else {
        offset = +_this.offset().top + +margin + 'px';
    }
    $("html, body").animate({ scrollTop: offset }, speed);

    setTimeout(function () {
        $(_this).pulsate({
            color: "#399bc3",
            reach: 10,
            repeat: 2,
            speed: 500,
            glow: false
        });
    },speed)



    return _this;
}

$.fn.ajaxBtn = function (options) {

    return this.each(function () {
        options = options || {};
        options.url = options.url || $(this).data('url');
        options.dataContainer = options.dataContainer || $(this).data('datacontainer');
        options.method = options.method || $(this).data('method') || 'post';
        options.done = options.done || $(this).data('done');
        options.fail = options.fail || $(this).data('fail');
        options.always = options.always || $(this).data('always');
        options.block = options.block || 'true';
        options.confirm = options.confirm || 'false';

        $(this).on('click', function () {
            _this = $(this);
            var run = function () {
                if (options.block == 'true') {
                    App.blockUI({
                        target: '.page-content'
                    });
                }

                var faClass = $(_this).find('.fa').attr('class');
                var text = $(_this).text();
                var miniLoader = '<i class="fa fa-spinner fa-pulse fa-fw"></i> ' + $(_this).text();
                $(_this).html(miniLoader);


                if (options.url != '') {
                    $[options.method](options.url, Util.serialize(options.dataContainer, 'true'))
                    .done(function (d) {
                        if (typeof options.done === 'function') {
                            options.done(d);
                        }

                    })
                    .fail(function () {
                        if (typeof options.fail === 'function') {
                            options.fail();
                        }
                    })
                    .always(function () {
                        if (typeof options.always === 'function') {
                            options.always(d);
                            try {
                                var chkfrm = eval('checkForm');
                                if (typeof chkfrm === 'function') {
                                    chkfrm();
                                }
                            } catch (e) {

                            }
                        }

                        var text = $(_this).text();
                        var defaultText = '<i class="' + faClass + '"></i> ' + $(_this).text();
                        $(_this).html(defaultText);

                      //  App.unblockUI('.page-content');
                    });
                }
            }

            if (options.confirm == 'true') {
                Util.Confirm(function () {
                    run();
                })
            } else {
                run();
            }

        });
    });

}

$.fn.ajaxEditBtn = function (options) {

    return this.each(function () {
        options = options || {};
        options.url = options.url || $(this).data('url');
        options.target = options.target || '';
        options.isModal = options.isModal || 'false';
        options.method = options.method || $(this).data('method') || 'post';
        options.done = options.done || $(this).data('done');
        options.fail = options.fail || $(this).data('fail');
        options.always = options.always || $(this).data('always');
        options.block = options.block || 'true';
        options.data = options.data || '';
        options.submitData = {};
        if (typeof options.data === 'function') {
            options.data(this, submitData);
        }
        $(document).on('click',this, function () {
            if (options.block == 'true') {
                App.blockUI({
                    target: options.target
                });
            }
            if (options.url != '') {
                $[options.method](options.url, options.submitData)
                .done(function (d) {
                    if (typeof options.done === 'function') {
                        options.done(d);
                    }
                })
                .fail(function () {
                    if (typeof options.fail === 'function') {
                        options.fail();
                    }
                })
                .always(function () {
                    if (typeof options.always === 'function') {
                        options.always(d);

                    }

                   // App.unblockUI(options.target);
                });
            }
        });
    });


}

$.fn.EnterExecuteDiv = function (options) {


    var _this = this;
    $(this).data('EnterExecute', 'initialized');
    options = options || {};
    options.url = options.url || '';
    options.method = options.method || 'post';
    options.bind = options.bind || {};
    options.bind.target = options.bind.target || 'body';



    options.bind.pref = options.bind.pref || '';
    options.done = options.done || '';
    options.data = options.data || '';
    options.src = options.src || '';
    options.override = options.override || 'false';

    /*
     *
     *     $(this).data('url', options.url);
    $(this).data('method', options.method);
    $(this).data('target', options.bind.target);
    $(this).data('pref', options.bind.pref);
    $(this).data('done', options.done);
    $(this).data('data', options.data);
    $(this).data('src', options.src);
    $(this).data('override', options.override);
     */
    var postData = {};
    $(document).on('keydown', '[data-toggle="ajaxform"],[data-toggle="ajaxrepform"]', function (e) {
        if ($(options.bind.target).is('form')) {
            Util.clearValidation(options.bind.target);
        }
        if ($(_this).is(":focus") && (e.keyCode == 13)) {
            if (_this.valid()) {
                if (typeof options.data === 'function') {
                    postData = options.data();
                } else {
                    var name = _this.attr('name');
                    var value = _this.val();
                    name = name.slice(name.lastIndexOf('.') + 1, name.length);

                    postData[name] = value;
                }
                log('start');
                App.blockUI({
                    target: options.bind.target
                })

                log('end');
                $[options.method](options.url, postData)
                .done(function (data) {
                    if (data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                        m.toast(data);
                        //$(options.bind.target).find('input, select').val('');
                    }

                    if (data.hasOwnProperty("NotSameCenter")) {
                        if (data.NotSameCenter) {
                            $('form').find('.custom-summary').html('<div class="alert alert-warning">The Data is Returned From Other Center!</div>');
                        } else {
                            $('form').find('.custom-summary').html('');

                        }
                    } else {
                        $('form').find('.custom-summary').html('');
                    }
                    if (typeof options.done === 'function') {
                        if (options.override == 'false') {
                            if (options.src == '') {
                                Util.bindInputs(options.bind.target, data, options.bind.pref);
                            } else {
                                Util.bindInputs(options.bind.target, options.bind.pref);
                            }
                        }
                        options.done(data);
                    } else {
                        if (options.src == '') {
                            Util.bindInputs(options.bind.target, data, options.bind.pref);
                        } else {
                            Util.bindInputs(options.bind.target, options.bind.pref);
                        }
                    }

                })
                .fail(function () {

                })
                .always(function () {
                //    App.unblockUI(
                         //  options.bind.target
                     //  )

                });
                return false;
            }

        }


    });

    return _this;
}



$.fn.EnterExecute = function (options, func) {


    if (options == 'refresh') {
        var isInit = $(this).data('EnterExecuteInitialized');
        if (isInit == 'true') {
            var event = jQuery.Event('keydown', { which: 13, keyCode:13 });
            $(this).trigger(event, func);
        } else {
            alert('Error: input is not initiated as Enter Execute');
        }

    } else {
        $(this).data('url', options.url);
        $(this).data('EnterExecuteInitialized', 'true');
        $(this).data('method', options.method);
        $(this).data('target', options.bind.target);
        $(this).data('pref', options.bind.pref);
        $(this).data('done', options.done);
        $(this).data('data', options.data);
        $(this).data('src', options.src);
        $(this).data('override', options.override);
        $(this).data('stay', options.bind.stay);
        $(this).on('keydown', function (keyDownEvent,func) {

            var _this = $(this);
            if (_this.val() != '') {
            options = options || {};
            options.url = $(this).data('url') || '';
            options.method = $(this).data('method') || 'post';
            options.bind = options.bind || {};

            options.bind.target = $(this).data('target') || 'body';


            options.bind.pref = $(this).data('pref') || '';
            var stay = $(this).data('stay') || '';
            var originalVal = $(this).val();
            options.done = $(this).data('done') || '';
            options.data = $(this).data('data') || '';
            options.src = $(this).data('src') || '';
            options.override = $(this).data('override') || 'false';
            var postData = {};
            var form = $(_this).closest('form')
            var formBinder = function () {
                return {
                    init: function () {
                        $(document).on('keydown', form, function (e) {
                            if (e.keyCode == 13) {
                                return false;
                            }

                        });
                        $(document).on('keypress', form, function (e) {
                            if (e.keyCode == 13) {
                                return false;
                            }
                        });
                        $(document).on('keyup', form, function (e) {
                            if (e.keyCode == 13) {
                                return false;
                            }
                        });
                        form.on('bind', form, function (e, func) {

                            if ($(options.bind.target).is('form')) {
                                Util.clearValidation(options.bind.target);
                            }

                            var thisForm = $(this);
                            if (e.keyCode == 13) {
                                if (_this.valid()) {
                                    if (typeof options.data === 'function') {
                                        postData = options.data();
                                    } else {
                                        var name = _this.attr('name');
                                        var value = _this.val();
                                        name = name.slice(name.lastIndexOf('.') + 1, name.length);

                                        postData[name] = value;
                                    }

                                    App.blockUI({
                                        target: options.bind.target
                                    })
                                    $[options.method](options.url, postData)
                                    .done(function (data) {
                                        if (!stay) {
                                            $(thisForm).find('input, select').val('');

                                        }
                                        $(thisForm).find('.custom-summary').html('');
                                        $(thisForm).find('select').trigger('change');


                                        if (data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                                            m.toast(data);

                                            if (!stay) {
                                                $(options.bind.target).find('input, select').val('');
                                            } else {
                                                $(_this).val(originalVal);

                                                log('return', 0);
                                                return 0;
                                            }


                                        }

                                        if (data.hasOwnProperty("NotSameCenter")) {
                                            if (data.NotSameCenter) {
                                                $('form').find('.custom-summary').html('<div class="alert alert-warning">The Data is Returned From Other Center!</div>');
                                            } else {
                                                $('form').find('.custom-summary').html('');

                                            }
                                        } else {
                                            $('form').find('.custom-summary').html('');
                                        }
                                        if (typeof options.done === 'function')
                                        {

                                            if (options.override == 'false') {
                                                    if (options.src == '') {
                                                        Util.bindInputs(options.bind.target, data, options.bind.pref);
                                                    } else {
                                                        Util.bindInputs(options.bind.target, options.bind.pref);
                                                    }


                                            }
                                            options.done(data);
                                        } else {
                                                if (options.src == '') {
                                                    Util.bindInputs(options.bind.target, data, options.bind.pref);
                                                } else {
                                                    Util.bindInputs(options.bind.target, options.bind.pref);
                                                }


                                        }


                                        if (stay) {
                                            $(_this).val(originalVal);
                                        }

                                    })
                                    .fail(function () {

                                    })
                                    .always(function () {
                                      //  App.unblockUI(
                                           //    options.bind.target
                                          // )
                                        if (typeof func === 'function') {
                                            func();
                                        }
                                        try {
                                            var chkfrm = eval('checkForm');
                                            if (typeof chkfrm === 'function') {
                                                chkfrm();
                                            }
                                        } catch (e) {

                                        }
                                    });
                                    return false;
                                }
                            }


                        });
                    },
                    bind: function (func) {
                        var event = jQuery.Event("bind");
                        event.keyCode = 13;
                            form.trigger(event, func);
                        form.off('bind');
                    }
                }
            }();

//$(_this).is(":focus") &&

                if (keyDownEvent.keyCode == 13) {
                formBinder.init();
                formBinder.bind(func);
            }
            }


            //_this.off('bind');
        })
    }


    return this;
}
$.fn.ClickExectue = function (options) {

    var _this = this;
    options = options || {};
    options.url = options.url || '';
    options.method = options.method || 'post';
    options.bind = options.bind || {};
    options.bind.target = options.bind.target || 'body';



    options.bind.pref = options.bind.pref || '';
    options.done = options.done || '';
    options.data = options.data || '';
    options.src = options.src || '';
    options.override = options.override || 'false';
    var postData = {};
    $(_this).off('click');
    $(_this).on('click', function (e) {
        if ($(options.bind.target).is('form')) {
            Util.clearValidation(options.bind.target);
        }

        var __this = $(this);
        e.preventDefault();
                if (typeof options.data === 'function') {
                    postData = options.data(__this);
                } else {
                    var name = _this.attr('name');
                    var value = _this.val();
                    name = name.slice(name.lastIndexOf('.') + 1, name.length);

                    postData[name] = value;
                }
                App.blockUI({
                    target: options.bind.target
                })
                $[options.method](options.url, postData)
                .done(function (data) {
                    if (data.hasOwnProperty("status") && data.hasOwnProperty("message")) {
                        m.toast(data);
                        return;
                    }
                    if (data.hasOwnProperty("NotSameCenter")) {
                        if (data.NotSameCenter) {
                            $('form').find('.custom-summary').html('<div class="alert alert-warning">The Data is Returned From Other Center!</div>');
                        } else {
                            $('form').find('.custom-summary').html('');

                        }
                    } else {
                        $('form').find('.custom-summary').html('');
                    }
                    if (typeof options.done === 'function') {
                        if (options.override == 'false') {


                            if (options.src == '') {

                                Util.bindInputs(options.bind.target, data, options.bind.pref);
                            } else {
                                Util.bindInputs(options.bind.target, options.bind.pref);
                            }
                        }
                        options.done(data);
                    } else {
                        if (options.src == '') {
                            Util.bindInputs(options.bind.target, data, options.bind.pref);
                        } else {
                            Util.bindInputs(options.bind.target, options.bind.pref);
                        }
                    }

                })
                .fail(function () {

                })
                .always(function () {
                   // App.unblockUI(
                          //  options.bind.target
                       // )

                    try {
                        var chkfrm = eval('checkForm');
                        if (typeof chkfrm === 'function') {
                            chkfrm();
                        }
                    } catch (e) {

                    }


                });
                return false;


    });

    return _this;
}

var m = function () {
    return {
        toast: function (d) {
            toastr.options = this.toastSettings;
            console.log("status=" + d.status);
            if (d.status > 0) {
                toastr["success"](d.message,"success!");
            }
            else if (d.status == -2) {
                toastr["info"](d.message,"info!");
            }
            else if(d.message=="تم التخزين بنجاح"){
                toastr["success"](d.message,"success!");
            }
            else {
                toastr["error"](d.message,"error!");
            }
        },
        toastSettings: {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }
}();





$(document).ready(function () {
    Util.init();
    $(document).ajaxComplete(function (event, xhr, settings) {
        var myHeader = xhr.getResponseHeader('custom-session-ended');
        if (myHeader) {
            window.location = "/Logout";
        }
    });
    $(document).ajaxError(function (event, jqxhr, settings, thrownError) {
        toastr.options =  {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-full-width",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        window.settings = settings;
        window.event = event;
        window.jqxhr = jqxhr;
        window.thrownError = thrownError;
        var HtmlError = $.parseHTML(jqxhr.responseText);
        if (Object.keys(HtmlError).length > 0) {
            toastr["error"](settings.url + ' says ' + HtmlError[1].text, "error!");
        } else {
            toastr["error"](settings.url + ' says : Unknown Error Occured!', "error!");
        }``


    });

    // $(".search-select").select2({
    //     placeholder: "Select from ..",
    //     allowClear: true
    // });

    $('#AddItemModal').on('hidden.bs.modal', function () {
        var _this = $(this);
        $(this).find('#MaterialCode').removeAttr('readonly');
        $(this).find('#BarCode').removeAttr('readonly');
        $(this).find('[data-target="#SearchItemModal"]').show();
    });

    $('#AddItemModal').on('hide.bs.modal', function () {
        Util.clearValidation('#AddItemForm');
    });

    $('#AddItemModal').on('shown.bs.modal', function () {
        var _this = $(this);
        $(_this).find('#MaterialCode').focus();
    });

    $('#SearchItemModal').on('shown.bs.modal', function () {
        var _this = $(this);
        $(_this).find('#ItemName').focus();
    });

    $('#AddItemModal').find('#MaterialCode').on('keypress', function (e) {
        if (isFinite(e.key)) {

        } else {
            var txt = $(this).val() +''+ e.key;
            $(this).closest('#AddItemModal').find('[data-target="#SearchItemModal"]').trigger('click');
            $('#SearchItemModal').find('#ItemName').val(txt);
        }
    });
    $(document).on('click', '.clickable-tr', function () {
        $(this).find('.select-item').trigger('click');
        setTimeout(function () {
            $('#AddItemModal').find('#Price').focus();
        },1000)
    });
//multi-char placeholder
});
