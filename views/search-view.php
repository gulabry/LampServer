<form action="" method="GET">
    <div class="form-group">
        <input type="text" 
            id="qInput" 
            name="q"
            class="form-control" 
            value="<?= htmlentities($q) ?>"
            placeholder="search by title"
            required
            >
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>