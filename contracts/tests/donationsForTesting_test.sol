pragma solidity ^0.4.25;
import "remix_tests.sol";
import "remix_accounts.sol";
import "./donationsForTesting.sol";

contract testSuite {
    Donations donations;

    function beforeAll() public {
        donations = new Donations();
    }

    function resgisterStudent() public {
        donations.registerStudent(0xdD870fA1b7C4700F2BD7f44238821C26f7392148, 100);
        Assert.equal(donations.getStudent(0xdD870fA1b7C4700F2BD7f44238821C26f7392148), true, "The Student '0xdD870fA1b7C4700F2BD7f44238821C26f7392148' is not registered");
    }
    
    function resgisterDonor() public {
        donations.registerDonor();
        Assert.equal(donations.getDonor(), true, "The Donor is not registered");
    }
    
    function firstDonation() public {
        donations.makeDonation(0xdD870fA1b7C4700F2BD7f44238821C26f7392148, 30);
        Assert.equal(donations.getLastDonation(0xdD870fA1b7C4700F2BD7f44238821C26f7392148), 30, "Error when making the 1st donation to '0xdD870fA1b7C4700F2BD7f44238821C26f7392148'");
    }
    
    function firstCheckCollected() public {
        Assert.equal(donations.checkCollected(0xdD870fA1b7C4700F2BD7f44238821C26f7392148), 30, "Error when calculating collected value of '0xdD870fA1b7C4700F2BD7f44238821C26f7392148'");
    }
    
    function secondDonation() public {
        donations.makeDonation(0xdD870fA1b7C4700F2BD7f44238821C26f7392148, 60);
        Assert.equal(donations.getLastDonation(0xdD870fA1b7C4700F2BD7f44238821C26f7392148), 60, "Error when making the 2nd donation to '0xdD870fA1b7C4700F2BD7f44238821C26f7392148'");
    }
    
    function secondCheckCollected() public {
        Assert.equal(donations.checkCollected(0xdD870fA1b7C4700F2BD7f44238821C26f7392148), 90, "Error when calculating collected value of '0xdD870fA1b7C4700F2BD7f44238821C26f7392148'");
    }
    
    function thirdDonation() public {
        donations.makeDonation(0xdD870fA1b7C4700F2BD7f44238821C26f7392148, 90);
        Assert.notEqual(donations.getLastDonation(0xdD870fA1b7C4700F2BD7f44238821C26f7392148), 90, "The 3rd donation to '0xdD870fA1b7C4700F2BD7f44238821C26f7392148' was above the goal");
        Assert.equal(donations.getLastDonation(0xdD870fA1b7C4700F2BD7f44238821C26f7392148), 10, "Error when making the 3rd donation to '0xdD870fA1b7C4700F2BD7f44238821C26f7392148'");
    }
    
    function thirdCheckCollected() public {
        Assert.equal(donations.checkCollected(0xdD870fA1b7C4700F2BD7f44238821C26f7392148), 100, "Error when calculating collected value of '0xdD870fA1b7C4700F2BD7f44238821C26f7392148'");
    }
}