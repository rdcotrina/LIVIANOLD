"use strict"
class LoginController_ extends LoginModel_{
    
    constructor(){
        super();    /*objeto heredado*/
       
        this._fields = super.getFields();
        
        this._addBtnSiguiente = function(){
            let btn = $('<button></button>');
            btn.attr({
                id: 'btnSiguiente',
                type: 'submit',
                class: 'btn bg-color-orange txt-color-white'
            });
            btn.html('<i class="fa fa-arrow-right"></i> '+LANG.SIGUIENTE);
            $('#login-form').find('footer').html(btn);
            this._evtBtnSiguiente();
        }

        this._addBtnEntrar = function(){
            let btn = $('<button></button>');
            btn.attr({
                id: 'btnEntrar',
                type: 'submit',
                class: 'btn bg-color-orange txt-color-white'
            });
            btn.html('<i class="fa fa-sign-in"></i> '+LANG.ENTRAR);
            $('#login-form').find('footer').html(btn);
            this._evtBtnEntrar();
        };
        
        this._evtBtnSiguiente = function(){
            $('#btnSiguiente').click(function(){
                Tools.removeValidate("#login-form");
                $("#login-form").validate({
                    // Rules for form validation
                    rules: {
                        txtUser: {
                            required: true
                        }
                    },
                    errorPlacement: function (error, element) {
                        error.insertAfter(element.parent());
                    }
                });
                if ($("#login-form").valid()) {
                    Exe.LoginController.nextLogin();
                }
            });
        };
        
        this._evtBtnEntrar = function(){
            $('#btnEntrar').click(function(){
                Tools.removeValidate("#login-form");
                $("#login-form").validate({
                    // Rules for form validation
                    rules: {
                        txtClave: {
                            required: true,
                            minlength: 3,
                            maxlength: 20
                        }
                    },
                    errorPlacement: function (error, element) {
                        error.insertAfter(element.parent());
                    }
                });
                if ($("#login-form").valid()) {
                    Exe.LoginController.login();
                }
            });
        };
        
        let t = this;
        setTimeout(function(){ t._evtBtnSiguiente(); },500);
    }
    
    login(){
        super.postLogin();
    }
    
    nextLogin (){
        $( "#stusuario" ).hide('slide',{direction: "left" }, 100);
        setTimeout(function(){
            $( "#stclave" ).show('slide', { direction: "right" }, 150);
        },100);
        /*quitar boton siguiente*/
        $('#btnSiguiente').remove();
        /*agregar btn entrar*/
        this._addBtnEntrar();
    }
        
    prevLogin(){
        $( "#stclave" ).hide('slide', { direction: "right" }, 100);
        setTimeout(function(){
            $( "#stusuario" ).show('slide', { direction: "left" }, 150);
        },100);
        /*quitar boton entrar*/
        $('#btnEntrar').remove();
        /*agregar btn siguiente*/
        this._addBtnSiguiente();
    }
    
    forgotPassword(){
        alert('falta...!')
    }
    
}

