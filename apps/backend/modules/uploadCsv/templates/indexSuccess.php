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
</form>