
<!DOCTYPE html>
<html>

<head>
<style>
    body {
  background: #1c242d;
}
.box {
  border: 1px solid #c4c4c4;
  padding: 30px 25px 10px 25px;
  background: white;
  margin: 30px auto;
  width: 360px;
}
h1.box-logo a {
  text-decoration:none;
}
h1.box-title {
  color: #AEAEAE;
  background: #f8f8f8;
  font-weight: 300;
  padding: 15px 25px;
  line-height: 30px;
  font-size: 25px;
  text-align:center;
  margin: -27px -26px 26px;
}
.box-button {
  border-radius: 5px;
  background: #d2483c;
  text-align: center;
  cursor: pointer;
  font-size: 19px;
  width: 100%;
  height: 51px;
  padding: 0;
  color: #fff;
  border: 0;
  outline:0;
}
.box-register
{
  text-align:center;
  margin-bottom:0px;
}
.box-register a
{
  text-decoration:none;
  font-size:12px;
  color:#666;
}
.box-input {
  font-size: 14px;
  background: #fff;
  border: 1px solid #ddd;
  margin-bottom: 25px;
  padding-left:10px;
  border-radius: 5px;
  width: 347px;
  height: 50px;
}
.box-input:focus {
    outline: none;
    border-color:#5c7186;
}
.sucess{
  text-align: center;
  color: white;
}
.sucess a {
  text-decoration: none;
  color: #58aef7;
}
p.errorMessage {
    background-color: #e66262;
    border: #AA4502 1px solid;
    padding: 5px 10px;
    color: #FFFFFF;
    border-radius: 3px;
}
</style>
</head>

<body>
    
     
        <form class="box" action="../model/ctrlAdAdmin.php" method="post">

            <h1 class="box-title">S'inscrire</h1>
            <input type="text" class="box-input" name="nom" placeholder="Nom d'utilisateur" required />
           
            <input type="text" class="box-input" name="email" placeholder="Email" required />
            <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
            <input type="submit" name="submit" value="S'inscrire" class="box-button" />
            <p class="box-register"> <a href="../admin.php">retour</a></p>
        </form>
 
</body>

</html>