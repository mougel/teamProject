<?php
if (isset($_SESSION['message'])){
		if ($_SESSION['message'] == "1") {
        print '<script type="text/javascript">alert("No such user exists, please try again.");</script>';
        unset($_SESSION['message']);
        }
        elseif ($_SESSION['message'] == "2") {
        print '<script type="text/javascript">alert("Wrong Password & Email combination, please try again.");</script>';
        unset($_SESSION['message']);
        }
        elseif ($_SESSION['message'] == "3") { 
        print '<script type="text/javascript">alert("Your passwords did not match, please try again.");</script>';
        unset($_SESSION['message']);
        }
        elseif ($_SESSION['message'] == "4") {
        print '<script type="text/javascript">alert("A user with such an email already exists. Maybe try logging in?");</script>';
        unset($_SESSION['message']);
		}
        elseif ($_SESSION['message'] == "5") {
        print '<script type="text/javascript">alert("No such item exists, please try again.");</script>';
        unset($_SESSION['message']);
		}
		elseif ($_SESSION['message'] == "6") {
        print '<script type="text/javascript">alert("Error! A particular item is not available!");</script>';
        unset($_SESSION['message']);
        }
        elseif ($_SESSION['message'] == "7") {
        print '<script type="text/javascript">alert("Error! This item has already been deleted!");</script>';
        unset($_SESSION['message']);
        }
        elseif ($_SESSION['message'] == "8") {
            print '<script type="text/javascript">alert("The database backup ' . ($_SESSION['filename']) . ' has been deleted.");</script>';
            unset($_SESSION['message']);
            unset($_SESSION['filename']);
        }
        elseif ($_SESSION['message'] == "9") {
        print '<script type="text/javascript">alert("Error! The item you are trying to add cannot be order along with the items already in 
                your basket. Please remove all items from the basket if you wish to order for a new meal or only order from 
                the current one.");</script>';
        unset($_SESSION['message']);
        }
        elseif ($_SESSION['message'] == "10") {
            print '<script type="text/javascript">alert("The database has been restored.");</script>';
            unset($_SESSION['message']);
        }
}
?>