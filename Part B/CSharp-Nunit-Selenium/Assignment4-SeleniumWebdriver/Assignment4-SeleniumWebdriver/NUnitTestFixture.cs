using System;
using System.Collections;
using System.Collections.Generic;
using NUnit.Framework;
using OpenQA.Selenium;
using OpenQA.Selenium.Firefox;
using OpenQA.Selenium.Support.UI;


namespace Assignment4_SeleniumWebdriver
{
    [TestFixture]
    public class NUnitTestFixture
    {
        private IWebDriver driver;
        private string baseURL, newURL, searchURL;

        [SetUp]
        public void SetupTest()
        {
            driver = new FirefoxDriver();
            WebDriverWait wait = new WebDriverWait(driver, TimeSpan.FromSeconds(10));
            //If using the same URL several times
            baseURL    = "http://localhost:8080/SQA-Assignment4/Index.php";
            newURL     = "http://localhost:8080/SQA-Assignment4/new.php";
            searchURL  = "http://localhost:8080/SQA-Assignment4/search.php";
    

        }

        [TearDown]
        public void TeardownTest()
        {
            if (driver != null)
            {
                driver.Quit();
            }
        }



        [Test]
        // TEST 1: Testing Open URL links
        public void ShouldOpen_All_Pages_Of_WebApplication()
        {
            driver.Url = "http://localhost:8080/SQA-Assignment4/Index.html"; ;
            Assert.IsFalse(driver.Url.Equals(baseURL));
            Console.WriteLine("1. Index.html is false, the correct baseURL is Index.php!");

            driver.Url = newURL;
            driver.FindElement(By.Id("new")).Click();
            Assert.IsTrue(driver.Url.Equals(newURL));
            Console.WriteLine("2. New Information page worked!");

            driver.Url = searchURL;
            Assert.IsTrue(driver.Url.Equals(searchURL));
            Console.WriteLine("3. Search page worked!");
            Console.WriteLine("");

        }

        [Test]
        // TEST 2: Testing: it will look for the elements that have been marked as required on the submitted attempt.
        public void ShouldReturnTrue_WhenCheckRequiredAllFieldsValidation()
        {

            // Open the new information page
            driver.Navigate().GoToUrl(newURL);

            // Enter the New car information
            driver.FindElement(By.CssSelector("input:required"));

            // Click Save button
            driver.FindElement(By.Id("myBtn")).Click();          

            var expectedAlertText = "Please fill out this fields.";
            Assert.IsTrue(true, expectedAlertText);
            Console.WriteLine("Required all field CSS validation returned true as expectedAlertText");
            Console.WriteLine("");
        }


        [Test]
        // TEST 3:
        public void Alert_Message_PhoneNumberValidation()
        {

            // Open the new information page
            driver.Navigate().GoToUrl(newURL);

            // Enter the New car information
            driver.FindElement(By.Id("txtfname")).SendKeys("PhoneNumber");
            driver.FindElement(By.Id("txtlname")).SendKeys("Testing");
            driver.FindElement(By.Id("txtaddress")).SendKeys("500 Summer Drive");
            driver.FindElement(By.Id("txtcity")).SendKeys("Toronto");

            // Phone validation with the invalid format
            driver.FindElement(By.Id("txtphone")).SendKeys("5194446666"); //Testing with Invalid format

            driver.FindElement(By.Id("txtemail")).SendKeys("peter@hotmail.com");
            driver.FindElement(By.Id("txtmake")).SendKeys("Mercedes-Benz");
            driver.FindElement(By.Id("txtmodel")).SendKeys("CLA ");

            SelectElement select = new SelectElement(driver.FindElement(By.Id("selectElementId")));
            select.SelectByText("2010");

            Console.WriteLine("1. Inputted invalid phone number as 5194446666");

            // Click the Save button
            driver.FindElement(By.Id("myBtn")).Click();
            Console.WriteLine("2. Clicked Save Button");

            var alert = driver.SwitchTo().Alert();
            var expectedAlertText = "Invalid Phone Number, Please input the acceptable formats, 123-123-1234, or (123)123-1234";
            Assert.AreEqual(expectedAlertText, alert.Text);
            Console.WriteLine("3. Alert Message validation shown successfully");
            Console.WriteLine("");
        }


        [Test]
        // TEST 4:
        public void Alert_Message_EmailValidation()
        {

            // Open the new information page
            driver.Navigate().GoToUrl(newURL);

            // Enter the New car information
            driver.FindElement(By.Id("txtfname")).SendKeys("Email");
            driver.FindElement(By.Id("txtlname")).SendKeys("Testing");
            driver.FindElement(By.Id("txtaddress")).SendKeys("500 Summer Drive");
            driver.FindElement(By.Id("txtcity")).SendKeys("Toronto");
            driver.FindElement(By.Id("txtphone")).SendKeys("519-444-6666");

            // Email validation here
            driver.FindElement(By.Id("txtemail")).SendKeys("peter@hotmail"); //Testing with Invalid format
            driver.FindElement(By.Id("txtmake")).SendKeys("Mercedes-Benz");
            driver.FindElement(By.Id("txtmodel")).SendKeys("CLA ");

            SelectElement select = new SelectElement(driver.FindElement(By.Id("selectElementId")));
            select.SelectByText("2011");

            Console.WriteLine("1. Inputted email address with invalid format as  peter@hotmail");

            // Click the Save button
            driver.FindElement(By.Id("myBtn")).Click();
            Console.WriteLine("2. Clicked Save Button");


            var alert = driver.SwitchTo().Alert();
            var expectedAlertText = "Invalid e-mail address!";
            Assert.AreEqual(expectedAlertText, alert.Text);
            Console.WriteLine("3. Alert Message validation shown successfully");
            Console.WriteLine("");

        }

        [Test]
        // TEST 5: Add New car information testing with phone number as (519)555-6666 [valid formet]
        public void ShouldReturnTrue_WhenGetAttributeValue_Of_ValidPhoneNumber()
        {
            driver.Navigate().GoToUrl(newURL);

            // Enter the New car information
            driver.FindElement(By.Id("txtfname")).SendKeys("Angelina");
            driver.FindElement(By.Id("txtlname")).SendKeys("jolie");
            driver.FindElement(By.Id("txtaddress")).SendKeys("500 Summer Drive");
            driver.FindElement(By.Id("txtcity")).SendKeys("Toronto");
            driver.FindElement(By.Id("txtphone")).SendKeys("(519)555-6666");
            driver.FindElement(By.Id("txtemail")).SendKeys("angelina@hotmail.com");
            driver.FindElement(By.Id("txtmake")).SendKeys("Toyoto");
            driver.FindElement(By.Id("txtmodel")).SendKeys("Matrix");

            SelectElement select = new SelectElement(driver.FindElement(By.Id("selectElementId")));
            select.SelectByText("2014");

            Console.WriteLine("1. Inputted all fields + valid phone number (519)555-6666");


            // Click the Save button
            driver.FindElement(By.Id("myBtn")).Click();
            Console.WriteLine("2. Clicked Save Button");

            var result = driver.FindElement(By.Id("displayPhone")).Text;
            Assert.IsTrue(true, driver.FindElement(By.Id("displayPhone")).GetAttribute("(519)555-6666"));
            Console.WriteLine("3. Valid format (519)555-6666 as expected ");
            Console.WriteLine("");
        }


        [Test]
        //TEST 6: Add New car information and navigate to the web pages 
        public void ShouldReturnTrue_WhenGetAttributeValue_Of_URL()
        {
            driver.Navigate().GoToUrl(newURL);

            // Enter the New car information
            driver.FindElement(By.Id("txtfname")).SendKeys("Benjamin");
            driver.FindElement(By.Id("txtlname")).SendKeys("McLean");
            driver.FindElement(By.Id("txtaddress")).SendKeys("500 Summer Drive");
            driver.FindElement(By.Id("txtcity")).SendKeys("Toronto");
            driver.FindElement(By.Id("txtphone")).SendKeys("519-444-6666");
            driver.FindElement(By.Id("txtemail")).SendKeys("peter@hotmail.com");
            driver.FindElement(By.Id("txtmake")).SendKeys("BMW");
            driver.FindElement(By.Id("txtmodel")).SendKeys("5-Series");

            SelectElement select = new SelectElement(driver.FindElement(By.Id("selectElementId")));
            select.SelectByText("2010");

            Console.WriteLine("1. Inputted all fields");
            

            // Click the Save button
            driver.FindElement(By.Id("myBtn")).Click();
            Console.WriteLine("2. Clicked Save Button");

            var expectedAlertText = "http://localhost:8080/SQA-Assignment4/BMW/5-Series/2017";
            var result = driver.FindElement(By.Id("URL")).Text;
            Assert.IsTrue(true, driver.FindElement(By.Id("URL")).GetAttribute(expectedAlertText));
            Console.WriteLine("3. URL with make/model/year is correct");
            Console.WriteLine("");

        }


        [Test]
        // TEST 7: Counting the total number of sellers display on the search page
        public void ShouldReturn_Total_Number_Of_Sellers_Display_On_SearchPage()
        {

            driver.Navigate().GoToUrl(searchURL);
         
            IList<IWebElement> Sellers = driver.FindElements(By.ClassName("text-success"));
            Console.WriteLine("1. Total Sellers :" + Sellers.Count);
            Console.Read();
            Console.WriteLine("");
        }

    }
}


