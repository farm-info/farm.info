<!DOCTYPE html>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <style>
        input[type=text],
        input[type=email],
        input[type=tel],
        input[type=date],
        textarea,
        select {
            width: 100%;
            padding: 15px;
            margin-top: 5px;
            margin-bottom: 22px;
            display: inline-block;
            font-size: 15pt;
        }

        #wrapper {
            width: 900px;
            margin: 0 auto;
        }

        button {
            background-color: #CCCCCC;
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 40%
        }

        input[type=text]:focus:valid {
            background-color: green;
        }

        input[type=text]:focus:invalid {
            background-color: red;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <h1>My Address Book</h1>
        <h2>Edit Contact</h2>
        <?php
            include("conn.php");
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM contacts WHERE id=$id";
            $result = mysqli_query($con,$sql);
            while ($row = mysqli_fetch_array($result)){
        ?>
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label>Name</label><br>
            <input type="text" name="contact_name" required value="<?php echo $row['contact_name']; ?>"><br><br>

            <label>Phone Number</label><br>
            <input type="tel" name="contact_phone" required value="<?php echo $row['contact_phone']; ?>"><br><br>

            <label>Email Address</label><br>
            <input type="email" name="contact_email" required value="<?php echo $row['contact_email']; ?>"><br><br>

            <label>Home Address</label><br>
            <textarea name="contact_address" required><?php echo $row['contact_address'] ?></textarea><br><br>

            <label>Gender</label><br>
            <input type="radio" name="contact_gender" value="Male" 
            <?php
                if ($row['contact_gender']=='Male'){
                    echo 'checked';
                }
            ?>            
            required> Male
            <input type="radio" name="contact_gender" value="Female" 
            <?php
                if ($row['contact_gender']=='Female'){
                    echo 'checked';
                }
            ?>            
            required> Female <br><br>

            <label>Relationship</label><br>
            <select name="contact_relationship" required>
                <option>Please Select</option>
                <option value="Family" 
                <?php
                    if ($row['contact_relationship']=='Family') {
                        echo 'selected';
                    }
                ?>                
                >Family</option>
                <option value="Friend" 
                <?php
                    if ($row['contact_relationship']=='Friend') {
                        echo 'selected';
                    }
                ?> 
                >Friend</option>
                <option value="Colleague" 
                <?php
                    if ($row['contact_relationship']=='Colleague') {
                        echo 'selected';
                    }
                ?> 
                >Colleague</option>
                <option value="Other" 
                <?php
                    if ($row['contact_relationship']=='Other') {
                        echo 'selected';
                    }
                ?> 
                >Other</option>
            </select><br><br>

            <label>Date of Birth</label><br>
            <input type="date" name="contact_dob" required value="<?php echo $row['contact_dob']; ?>"><br><br>

            <button>Submit</button>
            <button type="reset">Reset</button>



        </form>
        <?php
            }
        ?>
    </div>
</body>

</html>