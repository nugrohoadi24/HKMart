            function getdata() {
              var user = document.getElementById("panggilData").value;
              user.database().ref('dataSiswa/'+dataSiswa).once('value').then(function (snapshot){

                var Nama = snapshot.val().NAMA;
                var Username = snapshot.val().ID;
                var Password = snapshot.val().PASSWORD;
                var Alamat = snapshot.val().ALAMAT;
                var Saldo = snapshot.val().SALDO;

                document.getElementById("Nama").innerHTML=Nama;
                document.getElementById("Username").innerHTML=Username;
                document.getElementById("Password").innerHTML=Password;
                document.getElementById("Alamat").innerHTML=Alamat;
                document.getElementById("Saldo").innerHTML=Saldo;

              });
            }

