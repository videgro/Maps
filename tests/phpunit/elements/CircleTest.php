<?php

namespace Maps\Test;

use DataValues\LatLongValue;

/**
 * Unit tests for the Maps\Circle class.
 *
 * @since 3.0
 *
 * @ingroup MapsTest
 *
 * @group Maps
 * @group MapsElement
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class CircleTest extends BaseElementTest {

	/**
	 * @see BaseElementTest::getClass
	 *
	 * @since 3.0
	 *
	 * @return string
	 */
	public function getClass() {
		return 'Maps\Circle';
	}

	/**
	 * @see BaseElementTest::constructorProvider
	 *
	 * @since 3.0
	 *
	 * @return array
	 */
	public function constructorProvider() {
		$argLists = array();

		$argLists[] = array( false );
		$argLists[] = array( false, '' );
		$argLists[] = array( false, '4,2' );
		$argLists[] = array( false, new LatLongValue( 4, 2 ) );

		$argLists[] = array( true, new LatLongValue( 4, 2 ), 42 );
		$argLists[] = array( true, new LatLongValue( 42, 2.2 ), 9000.1 );

		$argLists[] = array( false, '~=[,,_,,]:3', 9000.1 );

		return $argLists;
	}

	/**
	 * @dataProvider instanceProvider
	 * @param \Maps\Circle $circle
	 * @param array $arguments
	 */
	public function testGetCircleCentre( \Maps\Circle $circle, array $arguments ) {
		$this->assertTrue( $circle->getCircleCentre()->equals( $arguments[0] ) );
	}

}



