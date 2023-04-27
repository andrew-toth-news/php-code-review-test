<?php

namespace NewscorpAU\Poker;

require "./classes/Deck.php";

$deckInstance = new Deck();
$mainLength   = count( $deckInstance->getDeck() );
$mainDeck     = $deckInstance->getDeck();
$shuffled = shuffle($mainDeck);
$mainResult   = needToCheckDeckState( $shuffled );

?>

<h1>Main Result</h1>
<h4><?php echo $mainResult[2]; ?></h4>

