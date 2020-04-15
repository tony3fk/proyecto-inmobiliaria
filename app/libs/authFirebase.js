
   // Your web app's Firebase configuration
    // var firebaseConfig = {
    //     apiKey: "AIzaSyC8ubn24RFj9FH7ys5LYx5edY-vacOCU0o",
    //     authDomain: "gestioninmobiliaria-15009.firebaseapp.com",
    //     databaseURL: "https://gestioninmobiliaria-15009.firebaseio.com",
    //     projectId: "gestioninmobiliaria-15009",
    //     storageBucket: "gestioninmobiliaria-15009.appspot.com",
    //     messagingSenderId: "201858462683",
    //     appId: "1:201858462683:web:6ce80885b75483ab1f2dfe",
    //     measurementId: "G-LXRZQWRH02"
    // };
    var firebaseConfig = {
        apiKey: "AIzaSyC2mc4gTTSwSnmK2QO9wH-OVbG6BMc0t4k",
        authDomain: "gestion-inmobiliaria-82e40.firebaseapp.com",
        databaseURL: "https://gestion-inmobiliaria-82e40.firebaseio.com",
        projectId: "gestion-inmobiliaria-82e40",
        storageBucket: "gestion-inmobiliaria-82e40.appspot.com",
        messagingSenderId: "760578758890",
        appId: "1:760578758890:web:e479d9d2e668740cf4df93"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

//google sign in
googleSignIn = () => {
    base_provider = new firebase.auth.GoogleAuthProvider()
    firebase.auth().signInWithPopup(base_provider).then(function (result) {
        // var accessToken = result.credential.accessToken;
        // var idToken = result.credential.idToken;
        // var providerId = result.credential.providerId;
        var displayName = result.user.displayName;
        var email = result.user.email;
        var providerId = result.user.providerData.providerId;
        var photoURL = result.user.photoURL;
        // console.log(result)
        console.log("Success!")
        
        //crear cookies
        document.cookie = "nombre=" + encodeURIComponent(displayName);
        document.cookie = "imagen=" + encodeURIComponent(photoURL);
        document.cookie = "tipo="+1;

        window.location.replace("http://localhost:8080/proyecto/index.php?ctl=inicio");

        // var userActivo = document.getElementById("userActivo");
        // userActivo.innerHTML(displayName);


    }).catch(function (error) {
        console.log(error);
        console.log("Error!");
        alert("Error!\n"+error.email+"\n"+error.message);
    })


}

//facebook sign in
facebookSignIn = () => { 
    base_provider = new firebase.auth.FacebookAuthProvider()
    
    firebase.auth().signInWithPopup(base_provider).then(function (result) {
        // var accessToken = result.credential.accessToken;
        // var idToken = result.credential.idToken;
        // var providerId = result.credential.providerId;
        var displayName = result.user.displayName;
        var email = result.user.email;
        var providerId = result.user.providerData.providerId;
        var photoURL = result.user.photoURL;
        console.log(result)
        console.log("Success!")
        

        //crear cookies
        document.cookie = "nombre=" + encodeURIComponent(displayName);
        document.cookie = "imagen=" + encodeURIComponent(photoURL);

        window.location.replace("http://localhost:8080/proyecto/index.php?ctl=inicio");
         
    }).catch(function (error) {
        console.log(error)
        console.log("Error!")
        alert("Error!\n"+error.email+"\n"+error.message);
    })

}

//twitter sign in
twitterSignIn = () => {
    base_provider = new firebase.auth.TwitterAuthProvider()
    
    firebase.auth().signInWithPopup(base_provider).then(function (result) {
        // var accessToken = result.credential.accessToken;
        // var idToken = result.credential.idToken;
        // var providerId = result.credential.providerId;
        var displayName = result.user.displayName;
        var email = result.user.email;
        var providerId = result.user.providerData.providerId;
        var photoURL = result.user.photoURL;
        console.log(result)
        console.log("Success!")
        

        //crear cookies
        document.cookie = "nombre=" + encodeURIComponent(displayName);
        document.cookie = "imagen=" + encodeURIComponent(photoURL);

        window.location.replace("http://localhost:8080/proyecto/index.php?ctl=inicio");
         
    }).catch(function (error) {
        console.log(error)
        console.log("Error!")
        alert("Error!\n"+error.email+"\n"+error.message);
    })
 }