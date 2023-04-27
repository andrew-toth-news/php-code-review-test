<?php

namespace Newscorpau\Poker;

use PHPUnit\Framework\TestCase;

/**
 * Test class to verify generated hand
 */
class CardsTest extends TestCase
{
	private Deck $deck;

	/**
	 * Fixture to create the object
	 */
	protected function setUp(): void
	{
		$this->deck = new Deck();
	}

	public function createDeck(): void
	{
		$this->assertIsArray( $this->deck );
	}

	public function shuffleCards(): void
	{
		$result = $this->deck->getDeck();
		shuffle( $result );
		$this->assertIsArray($result);
	}

	public function checkResults(): void
	{
		$result = needToCheckDeckState( $this->deck );
		$this->assertIsArray($result);
	}
}
