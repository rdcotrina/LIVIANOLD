"use strict"
class LoginModel_ extends Ajax_{
    
    constructor(){
        super();
        this._controller = 'sistema/main/Login/';
        
        this._fields = {
            usuario: $('#txtUser'),
            clave: $('#txtClave')
        };
    }
    
    getFields(){
        return this._fields;
    }
    
    postLogin(){
        super.send({
            flag: 1,
            element: '#btnEntrar',
            encrypt: true,
            root: this._controller + 'postLogin',
            form: '#login-form',
            clear: false,
            fnCallback: function (data) {
                if (data.result == 1) {
                    Tools.notify().ok({
                        content: LANG.LOGINOK
                    });
                } else if (data.result == 2) {
                    $( "#efectlogin" ).effect('shake');
                    Tools.notify().error({
                        content: LANG.LOGINFAIL
                    });
                }
            }
        });
    }
    
}