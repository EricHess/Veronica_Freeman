<?php #QUERY DATABASE FOR NODE IDS OF THE ITEMS IN NEWS ITEMS CONTENT TYPE
$newsNodes = db_select('node', 'n')
->fields('n', array('nid'))
->fields('n', array('type'))
->condition('n.type', 'news_item')
->execute()
->fetchCol(); // returns an indexed array

#NODE LOAD THOSE IDS THAT WERE GRABBED ABOVE
$newsNodes = node_load_multiple($newsNodes);

?>

THIS IS THE NEWS PAGE