<?php

namespace NewscorpAU\Poker;
class Deck {
	/**
	 * Return deck array
	 * @return array
	 */
	function getDeck() {
		$deck       = array();
		$suits      = ['h', 's', 'c', 'd'];
		$values     = ['a', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'j', 'q', 'k'];
		foreach ( $suits as $suit ) {
			foreach ( $values as $value ) {
				$mainVal = $value."".$suit;
				array_push($deck, $mainVal );
			}
		}
		return $deck;
	}

	/**
	 * @param $numbers
	 *
	 * @return bool|void
	 */
	function isIncreasingSequence( $numbers ) {
		if ( is_array( $numbers ) ) {
			$flag = false;
			foreach( $numbers as $num => $val ) {
				if ( $num === 0 || $num[$val - 1] < $num ) {
					$flag = true;
				}
			}
			return $flag;
		}
	}
}

function needToCheckDeckState( $deckArray ) {
	global $deckInstance;
	$outputArray        = array();
	$newSliceSuitArray  = array();
	$newSliceValueArray = array();
	$n                  = 5;
	$selected           = array_slice($deckArray, 0, $n, true);

	foreach ( $selected as $select ) {
		$mainSlice = str_split($select);
		if ( count($mainSlice) === 3 ) {
			$mainValueSlice = $mainSlice[0]+$mainSlice[1];
			$mainSuitSlice  = $mainSlice[2];
		} else {
			$mainValueSlice = $mainSlice[0];
			$mainSuitSlice  = $mainSlice[1];
		}
		array_push($newSliceSuitArray, $mainSuitSlice);
		array_push($newSliceValueArray, $mainValueSlice);
	}
	$mainResult = "";
	foreach ( $newSliceSuitArray as $newSliceSuit ) {
		foreach ( $newSliceValueArray as $newSliceValue ) {
			if ( ( $newSliceSuit == $newSliceSuitArray[0] ) ) {
				$mainResult = "Flush";
			} else if ( ( $newSliceSuit != $newSliceSuitArray[0] ) && $deckInstance->isIncreasingSequence( $newSliceValueArray ) ) {
				$mainResult = "Straight";
			} else if ( ( $newSliceSuit == $newSliceSuitArray[0] ) && $deckInstance->isIncreasingSequence( $newSliceValueArray ) && ( $newSliceSuit != $newSliceSuitArray[0] ) ) {
				$mainResult = "Straight Flush";
			} else {
				$mainResult = "Not comes under state of flush, straight, and straight flush";
			}
		}
	}
	$outputArray[0] = $deckArray;
	$outputArray[1] = $selected;
	$outputArray[2] = $mainResult;

	return $outputArray;
}
