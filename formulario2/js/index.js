  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Por favor escribe tu nombre'
                    }
                }
            },
             apellidos: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Por favor escribe tu apellido'
                    }
                }
            },
            semestre: {
                validators: {
                    notEmpty: {
                        message: 'Por favor selecciona tu semestre'
                    },
                    semestre: {
                        message: 'Por favor elige un semestre válido'
                    }
                }
            },
            correo: {
                validators: {
                    notEmpty: {
                        message: 'Por favor escribe un correo válido'
                    },
                    correo: {
                        country: 'MX',
                        message: 'Por favor escribe un correo válido'
                    }
                }
            },
            matricula: {
                validators: {
                    numeric: {
                        message:'Solo teclea números'
                    },
                     intLength: {
						max:8,
                    },
                    notEmpty: {
                        message: 'Escribe tu Matrícula'
                    }
                }
            },
            carrera: {
                validators: {
                    notEmpty: {
                        message: 'Por favor selecciona una opción'
                    }
                }
            },
            telefono: {
                validators: {
                    notEmpty: {
                        message: 'Por favor escribe tu teléfono'
                    }
                }
            }/*,
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },
            comment: {
                validators: {
                      stringLength: {
                        min: 5,
                        max: 200,
                        message:'Escribe más de 5 caracteres y menos de 50'
                    },
                    notEmpty: {
                        message: 'Por favor escribe hrs. libres'
                    }
                    }
                }*/
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});