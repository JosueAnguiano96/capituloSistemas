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
                        min: 2
                    },
                    notEmpty: {
                        message: 'Por favor escribe tu apellido'
                    }
                }
            },
            correo: {
                validators: {
                    notEmpty: {
                        message: 'Por favor escribe tu correo'
                    },
                    correo: {
                        message: 'Por favor escribe tu email válido'
                    }
                }
            },
            telefono: {
                validators: {
                    numeric: {
                        message: 'Teclea solo números'
                    },
                    notEmpty: {
                        message: 'Por favor escribe un número válido'
                    },
                    telefono: {
                        country: 'MX',
                        message: 'Por favor escribe un número válido'
                    }
                }
            },
           matricula: {
                validators: {
                    numeric: {
                        message:'Teclea solo números'
                    },
                     intLength: {
                        max:8,
                    },
                    notEmpty: {
                        message: 'Escribe tu Matrícula'
                    }
                }
            },
            hrslbs: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Por favor escribe tus horas libres'
                    }
                }
            },
            semestre: {
                validators: {
                    notEmpty: {
                        message: 'Por favor selecciona una opción'
                    }
                }
            },
            fechanac: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona una fecha'
                    },
                    fechanac: {
                        country: 'US',
                        message: 'Selecciona una fecha'
                    }
                }
            },
            especialidad: {
                validators: {
                    notEmpty: {
                        message: 'Por favor selecciona una opción'
                    }
                }
            }
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