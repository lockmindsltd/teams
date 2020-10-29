// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
var firebaseConfig = {
    apiKey: "AIzaSyB68R0gcajiG1rp8_u27o1z8Lji0CX1rAI",
    authDomain: "lockminds-laravel-packages.firebaseapp.com",
    databaseURL: "https://lockminds-laravel-packages.firebaseio.com",
    projectId: "lockminds-laravel-packages",
    storageBucket: "lockminds-laravel-packages.appspot.com",
    messagingSenderId: "244604718831",
    appId: "1:244604718831:web:475a0a05a4ef673b9c151a",
    measurementId: "G-C51LQWJ2Z6"
};
// Initialize Firebase
const firebaseApp = firebase.initializeApp(firebaseConfig);
const firebaseAnalytics = firebase.analytics();
const firebaseDatabase = firebase.database();
const firebaseStore = firebase.firestore();
const firebaseAuthorization = "key=AAAAOPOTzu8:APA91bG8U4zlQgxSByt-wGqivJLBJBYySDnQ8g1mDSsD33nlzF6vqXi7HB_jNl_eVq9iuCkF7st1JMz4j--YLM4mpM4uu4oQxzXJz4AExWuUq37Bble9l_8to-pWZwzERU7OCu_aAL2I";
const firebaseWebPush = "BF63TdMgChweLjXE-carOKut5z08qZmNnTZo-VnLtIhqDbJ97PwQkxgLC2JqhXX8uaORNcRqJyPTiaHQrOO5VBQ";
var userData = null;
var promptLogin = true;
var promptRegister = false;

function attemptLogin(){
    let email = $('input#attempt-login-email').val();
    let password = $('input#attempt-login-password').val();

    firebaseApp.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
        // Handle Errors here.

        if(error.code == 'auth/user-not-found'){
            promptRegister = true;
            promptLogin = false;
        }else{
            promptRegister = false;
            promptLogin = true;
        }

        let register = $('div#firebase-register');
        let form = $('div#firebase-login');
        let chats = $('div#read-chats');

        if(promptLogin){

            swal.fire("Messaging Service",error.message,'error');
            form.show();
            register.hide();
        }

        if(promptRegister){

            swal.fire("Messaging Service",error.message,'error');
            form.hide();
            register.show();
        }

        chats.hide();

    });
}

function attemptRegister(){
    let email = $('input#re-attempt-login-email').val();
    let password = $('input#re-attempt-login-password').val();
    let repassword = $('input#re-attempt-login-re-password').val();

    if(repassword !== password){
        swal.fire("Password Error","Password do not match",'error');
        return ;
    }

    firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
        // Handle Errors here.
        swal.fire("Messaging Service",error.message,'error');
    });

}

function attemptLogout(){
    firebaseApp.auth().signOut().then(function() {
        //window.location.reload();
    }).catch(function(error) {
        swal.fire("Messaging Service",error.message,"error");
    });
}

function displayLogin(){
    let register = $('div#firebase-register');
    let form = $('div#firebase-login');
    let chats = $('div#read-chats');

    if(promptLogin){
        form.show();
        register.hide();
    }else {
        register.show();
        form.hide();
    }

    chats.hide();

}

function hideLogin(){

    let form = $('div#firebase-login');
    let register = $('div#firebase-register');
    let chats = $('div#read-chats');
    chats.show();
    form.hide();
    register.hide();

}
