   // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyC8ubn24RFj9FH7ys5LYx5edY-vacOCU0o",
        authDomain: "gestioninmobiliaria-15009.firebaseapp.com",
        databaseURL: "https://gestioninmobiliaria-15009.firebaseio.com",
        projectId: "gestioninmobiliaria-15009",
        storageBucket: "gestioninmobiliaria-15009.appspot.com",
        messagingSenderId: "201858462683",
        appId: "1:201858462683:web:6ce80885b75483ab1f2dfe",
        measurementId: "G-LXRZQWRH02"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    googleSignIn = () => {
        base_provider = new firebase.auth.GoogleAuthProvider()
        firebase.auth().signInWithPopup(base_provider).then(function(result) {
            // var accessToken = result.credential.accessToken;
            // var idToken = result.credential.idToken;
            // var providerId = result.credential.providerId;
            var displayName = result.user.displayName;
            var email = result.user.email;
            var photoURL = result.user.photoURL;
            console.log(result)
            console.log("Success!")
            //mandar variables a la sesión
            document.cookie = "nombre=" + encodeURIComponent(displayName);
            document.cookie="imagen="+ encodeURIComponent(photoURL);

            window.location.replace("http://localhost:8080/proyecto/web/index.php?ctl=inicio");

            // var userActivo = document.getElementById("userActivo");
            // userActivo.innerHTML(displayName);


        }).catch(function(error) {
            console.log(error)
            console.log("Error!")
        })
    }