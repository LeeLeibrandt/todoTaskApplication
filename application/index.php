<?php

    include('server.php'); 

    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM Tasks WHERE id=$id ORDER BY DESC");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['task'];
			$address = $n['duedate'];
		}
    }
    
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
    
        mysqli_query($db, "UPDATE Tasks SET task='$name', duedate='$address' WHERE id=$id");
        $_SESSION['message'] = "Address updated!"; 
        header('location: index.php');
    }

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
	<title></title>
</head>
<body>
	<form method="post" action="server.php" >
        <center><div class="main-input">
            <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                    <?php 
                        echo $_SESSION['message']; 
                        unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif ?>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-group">
                <label>TODO LIST</label>
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Add task..">
                <input type="date" name="address" value="<?php echo $address; ?>" placeholder="Add due date..">
            </div>

            <div class="add-btn">
                 <?php if ($update == true): ?>
                    <button class="btn" type="submit" name="update">=</button>
                <?php else: ?>
                    <button class="btn" type="submit" name="save" >+</button>
                <?php endif ?>
            </div>
        </div>

        <table>
            <tr>
                <th>Tasks</th>
                <th>Duedates</th>
                <th style="width: 60px;">Action</th>
            </tr>

            <?php $results = mysqli_query($db, "SELECT * FROM Tasks"); ?>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['task']; ?></td>
                    <td><?php echo $row['duedate']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                        <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
        <div class="curve end">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rebeccapurple" fill-opacity="0.5" d="M0,192L48,181.3C96,171,192,149,288,144C384,139,480,149,576,170.7C672,192,768,224,864,245.3C960,267,1056,277,1152,245.3C1248,213,1344,139,1392,101.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
</body>
</html>