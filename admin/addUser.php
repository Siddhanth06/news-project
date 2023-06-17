    <?php
    include_once("./header.php");
    ?>

    <div class="add_user_form container">
        <div class="add_user_vector">
            <img src="./images//global-data-security-personal-data-security-cyber-data-security-online-concept-illustration-internet-security-information-privacy-protection_1150-37336.avif" alt="">
        </div>

        <div class="add_user_fields">
            <form action="saveAddUserData.php" class="add_user" method="post">
                <div>
                    <label for="">First Name</label><br>
                    <input type="text" name="firstname" class="input">
                </div>
                <div>
                    <label for="">Last Name</label><br>
                    <input type="text" name="lastname" class="input">
                </div>
                <div>
                    <label for="">Username</label><br>
                    <input type="text" name="username" class="input">
                </div>
                <div>
                    <label for="">Password</label><br>
                    <input type="password" name="password" class="input">
                </div>
                <div>
                    <label for="">User Role</label><br>
                    <select name="select" id="select">
                        <option selected value="0">Normal User</option>
                        <option value="1">Admin User</option>
                    </select>
                </div>
                <div></div>
                <button class="add_user_btn" type="submit">Add User</button>
            </form>
        </div>
    </div>
    <?php
    include_once("./footer.php");
    ?>