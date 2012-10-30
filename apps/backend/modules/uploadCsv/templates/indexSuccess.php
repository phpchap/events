<!-- START NEW THREAD FORM -->
<form action="<?php echo url_for('@uploadCsv'); ?>" method="POST" enctype="multipart/form-data"> 
<table>
    <?php echo $form; ?>
    <tr>
        <td>
            <input type="submit" value="Upload CSV" class="btn btn-success">
        </td>
    </tr>
</table>

<?php if(count($errors) > 0) { ?>
    <h2>Error Report</h2>
    <ul>
        <?php foreach($errors as $error) { ?>
            <li><?php echo $error; ?></li>            
        <?php } ?>
    </ul>    
<?php } ?>

<hr>

<?php if(count($successes) > 0) { ?>
    <h2>Success Report</h2>
    <ul>
        <?php foreach($successes as $success) { ?>
            <li><?php echo $success; ?></li>            
        <?php } ?>        
    </ul>        
<?php } ?>
</form>