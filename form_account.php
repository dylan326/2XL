<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="add/add_user.php" method="post">
            <h2>Create New Account</h2>
            <fieldset><legend>User Info</legend>
                User Name: <input type="text" name="username"><br>
                Password: <input type="password" name="password"><br>
            </fieldset>
            <fieldset><legend>Payment Info</legend>
                Card Number: <input type="text" name="creditcard_number" maxlength="12"><br>
                Expiration:
                <select name='expiration_month'>
                                <option value='01'>January</option>
                                <option value='02'>Febuary</option>
                                <option value='03'>March</option>
                                <option value='04'>April</option>
                                <option value='05'>May</option>
                                <option value='06'>June</option>
                                <option value='07'>July</option>
                                <option value='08'>August</option>
                                <option value='09'>September</option>
                                <option value='10'>October</option>
                                <option value='11'>November</option>
                                <option value='12'>December</option>
                        </select>
                        <input type="text" name="expiration_year" maxlength="4" placeholder="Year">
                <br>
                CVV: <input type="text" name="cvv" maxlength="3"><br>
            </fieldset>
            <input type="submit" value="Create Account">
        </form>
         <p><span><a href="index.php">Back</a></span></p>
    </body>
</html>
