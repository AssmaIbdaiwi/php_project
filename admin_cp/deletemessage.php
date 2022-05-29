<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Set a style for all buttons */
button {
 
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.95;
  
}

button:hover {
  opacity: 1;
}

/* Float cancel and delete buttons and add an equal width */
.cancelbtn, .deletebtn {
  float: left;
  width: 50%;

}

/* Add a color to the cancel button */
.cancelbtn {
  background-color: #ccc;
  color: black;
  decoration: none;
}

/* Add a color to the delete button */
.deletebtn {
  background-color: #c42700;
}

/* Add padding and center-align text to the container */
.container {
  padding: 16px;
  text-align: center;
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Modal Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and delete button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .deletebtn {
     width: 100%;
  }
}
</style>
 
    <div class="container">
      <h1>Delete Category</h1>
      <p>Are you sure you want to delete<b> <?php echo $_POST['name'] ?> </b>category?</p>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><a href="categories.php">Cancel</a></button>
        <form method="post" action="deletecategories.php">
        <input type="hidden" name="id2" value="<?php echo $_POST['id'] ?>">
        <button type="submit" class="deletebtn">Delete</button>
        </form>
      </div>
    </div>
 
</div>
