<table class="table table-hover">
    <tr>
        <th>Title</th>
        <th>Release Date</th>
        <th>Tickets Sold</th>
        <th>Gross Revenue</th>
    </tr> 
    
    <?php foreach($matches as $match): ?>
    <tr>
        <td><?= htmlentities($match['title']) ?></td>
        <td><?= htmlentities($match['released']) ?></td>
        <td><?= htmlentities($match['tickets']) ?></td>
        <td><?= htmlentities($match['gross']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>