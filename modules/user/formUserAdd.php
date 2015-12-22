<Center>
<form action="index.php?page=actionuser&actions=save" method="post">
<div id="style">
    <fieldset>
    <legend>&nbsp;Tambah User Admin&nbsp;</legend>
    <table border="0" align="Center">
        <tr>
            <td><label for="username">Username</label></td>    
            <td>:</td>
            <td><input type="text" name="username" id="username" required></td>
            <td>&nbsp;</td>
            <td><label for="password">Password</label></td>
            <td>:</td>
            <td><input type="password" name="password" id="password" required></td>
        </tr>
        <tr>
            <td><label for="level_id">User Level</label></td>
            <td>:</td>
            <td>
                <select name="level_id" id="level_id">
                    <option value="" selected>- Pilih Level -</option>
                    <option value="Admin">Admin</option>
                </select>
            </td>
            <td>&nbsp;</td>
            <td><label for="is_active">Status</label></td>
            <td>:</td>
            <td>
                <div class="radio">
                    <label><input type="radio" name="is_active" id="is_active" value="1" checked>Aktif</label>
                    <label><input type="radio" name="is_active" id="is_active" value="0">Tidak Aktif</label>
                </div>
            </td>
        </tr>
        <tr>
            <td align="Right" colspan="7"><input type="submit" name="button" value="Save">&nbsp;<input type="reset" name="reset" value="Reset"></td>
        </tr>
    </table>
    </fieldset>
</div>
</form>
</Center>