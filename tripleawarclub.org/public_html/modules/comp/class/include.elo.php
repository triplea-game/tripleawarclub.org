<?php
/*
* Elo PHP Class v0.1
*
* Functions:
* 1. calculateEloRatings
* Returns array of the new ratings for playerA and playerB based on Elo rating system calculations.
* 
* @var $playerAOldRating the initial rating of playerA
* @var $playerBOldRating the initial rating of playerB
* @var $gameOneWinner the winner of the first game (0 for playerA, 1 for playerB)
* @var $gameTwoWinner the winner of the second game (0 for playerA, 1 for playerB)
* @var $maxRatingDifference if the ratings difference is too large, this value will overide it
* @var $minimizer will decide wether to use the minimum of the K values for calculations
* @var $konstantArr array of all the brackets and their K values, format: array([0] => array (2000, 32) [1] => array (2400, 24) [2] => array (2400, 16))
* @return integer array of the new ratings for PlayerA and PlayerB and the rating change
*/

function calculateEloRatings($playerAOldRating, $playerBOldRating, $gameOneWinner, $gameTwoWinner, $maxRatingDifference, $minimizer, $konstantArr){

	/*
	* other variable declarations
	*/
	
		$playerANewRating=0;
		$playerBNewRating=0;
		$playerAScore=0;
		$playerBScore=0;
		$playerAExpectedScore=0;
		$playerBExpectedScore=0;
		$ratingDifferenceAB=0; // A-B
		$konstantArrSize=0;
		$playerAKonstant=0;
		$playerBKonstant=0;
		$konstantMinimized=0;
		$newRatingDifference=0;

	/* 
	* First find the score for each player (A 0, B 1) for the match 
	* Winning both games gives score 1, draw 0.5, losing 0
	*/

		if($gameOneWinner!=$gameTwoWinner){ // Draw!
			$playerAScore=0.5;
			$playerBScore=0.5;
		} elseif($gameOneWinner==0){ // A wins both
			$playerAScore=1;
		} elseif($gameOneWinner==1){ // B wins both
			$playerBScore=1;
		}
		
	/*
	* Run through the konstantArr to find the konstant for each player's rank level.
	* 1. Check the array size.
	* 2. First loop for playerA's konstant
	* 3. Second loop for playerB's konstant
	*/

		$konstantArrSize=count($konstantArr);

		foreach ($konstantArr as $key=>$var){
			if($key==$konstantArrSize-1){
				if($playerAOldRating>=$konstantArr[$key][0]){
					$playerAKonstant=$konstantArr[$key][1];
					break;
				}			
			} else {
				if($playerAOldRating<=$konstantArr[$key][0]){
					$playerAKonstant=$konstantArr[$key][1];
					break;
				}
			}
		}

		foreach ($konstantArr as $key=>$var){
			if($key==$konstantArrSize-1){
				if($playerBOldRating>=$konstantArr[$key][0]){
					$playerBKonstant=$konstantArr[$key][1];
					break;
				}
			} else {
				if($playerBOldRating<=$konstantArr[$key][0]){
					$playerBKonstant=$konstantArr[$key][1];
					break;
				}
			}
		}

	/*
	* Now, some preliminary calculations:
	* 1. Get the rating difference between both players (A-B).
	* 2. Check if the absolute value of the rating difference is greater then the maximum and update accordingly.
	* 3. Calculate the expected score of both players.
	*/

		$ratingDifferenceAB=$playerAOldRating-$playerBOldRating;

		if(abs($ratingDifferenceAB)>$maxRatingDifference){
			$ratingDifferenceAB=$ratingDifferenceAB > 0 ? $maxRatingDifference : -$maxRatingDifference;
		}

		$playerAExpectedScore=1/(1+pow(10,(-$ratingDifferenceAB/400)));
		$playerBExpectedScore=1/(1+pow(10,($ratingDifferenceAB/400)));

	/*
	* Here we check if we use the minimizer function for K values is enabled (1). If it is enabled, then we use the lowest K value.
	* And lastly, do the ratings calculation, and prepare the output array.
	*/

		if($minimizer==1){
			$konstantMinimized=min($playerAKonstant, $playerBKonstant);
			$playerANewRating=round($playerAOldRating+$konstantMinimized*($playerAScore-$playerAExpectedScore));
			$playerBNewRating=round($playerBOldRating+$konstantMinimized*($playerBScore-$playerBExpectedScore));
		} else {
			$playerANewRating=round($playerAOldRating+$playerAKonstant*($playerAScore-$playerAExpectedScore));
			$playerBNewRating=round($playerBOldRating+$playerBKonstant*($playerBScore-$playerBExpectedScore));
		}

	$newRatingDifference = abs($playerANewRating-$playerAOldRating);
		
	return array($playerANewRating,$playerBNewRating,$newRatingDifference, $newRatingDifference);

}

?>