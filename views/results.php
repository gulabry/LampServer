<table class="table table-hover">
    <tr>
        <th>Title</th>
        <th>Release Date</th>
        <th>Tickets Sold</th>
        <th>Gross Revenue</th>
    </tr> 
    
    <?php foreach($matches as $match): ?>
    <tr>
        <td><a href="/views/movieView.php?id=<?=htmlentities($match['imdb_id'])?>"><?= htmlentities($match['title']) ?></a></td>
        <td><?= htmlentities(date("j-M-Y", strtotime($match['released']))) ?></td>
        <td><?= htmlentities(number_format($match['tickets'])) ?></td>
        <td>$<?=htmlentities(number_format($match['gross'])) ?></td>
    </tr>
    <?php endforeach; ?>
</table>