     //
     //
     //   Code copyright C Davies 03/11/2010
     //    www.chris-davies.com
     //
     //    Use this code at your own risk!
     //
     //    You are free to use this code as long as the comment
     //    herein is left intact.
     //
     //    This code is not guaranteed fit for any particular purpose
     //    and no responsibility will be or is implied for its use.
     //
     //
     //

function PopulateList() {

    angleList = document.SolarCalc.facingWall;

   // Clear out the list  then set second list depending on value of first list

   ClearOptions(document.SolarCalc.tiltAngle);

   if (angleList[angleList.selectedIndex].value == "1") {
      AddToOptionList(document.SolarCalc.tiltAngle, "1042", "30");
      AddToOptionList(document.SolarCalc.tiltAngle, "1023", "45");
      AddToOptionList(document.SolarCalc.tiltAngle, "960", "60");
      AddToOptionList(document.SolarCalc.tiltAngle, "724", "vertical");
      AddToOptionList(document.SolarCalc.tiltAngle, "933", "horizontal");
   }

   if (angleList[angleList.selectedIndex].value == "2") {
      AddToOptionList(document.SolarCalc.tiltAngle, "997", "30");
      AddToOptionList(document.SolarCalc.tiltAngle, "968", "45");
      AddToOptionList(document.SolarCalc.tiltAngle, "900", "60");
      AddToOptionList(document.SolarCalc.tiltAngle, "684", "vertical");
      AddToOptionList(document.SolarCalc.tiltAngle, "933", "horizontal");
   }

   if (angleList[angleList.selectedIndex].value == "3") {
      AddToOptionList(document.SolarCalc.tiltAngle, "886", "30");
      AddToOptionList(document.SolarCalc.tiltAngle, "829", "45");
      AddToOptionList(document.SolarCalc.tiltAngle, "753", "60");
      AddToOptionList(document.SolarCalc.tiltAngle, "565", "vertical");
      AddToOptionList(document.SolarCalc.tiltAngle, "933", "horizontal");
   }

   if (angleList[angleList.selectedIndex].value == "4") {
      AddToOptionList(document.SolarCalc.tiltAngle, "762", "30");
      AddToOptionList(document.SolarCalc.tiltAngle, "666", "45");
      AddToOptionList(document.SolarCalc.tiltAngle, "580", "60");
      AddToOptionList(document.SolarCalc.tiltAngle, "427", "vertical");
      AddToOptionList(document.SolarCalc.tiltAngle, "933", "horizontal");
   }

      if (angleList[angleList.selectedIndex].value == "5") {
      AddToOptionList(document.SolarCalc.tiltAngle, "709", "30");
      AddToOptionList(document.SolarCalc.tiltAngle, "621", "45");
      AddToOptionList(document.SolarCalc.tiltAngle, "486", "60");
      AddToOptionList(document.SolarCalc.tiltAngle, "360", "vertical");
      AddToOptionList(document.SolarCalc.tiltAngle, "933", "horizontal");
   }
}

  function ClearOptions(OptionList) {

   // Always clear an option list from the last entry to the first
   for (x = OptionList.length; x >= 0; x--) {
      OptionList[x] = null;
   }
}

function AddToOptionList(OptionList, OptionValue, OptionText) {
   // Add option to the bottom of the list
   OptionList[OptionList.length] = new Option(OptionText, OptionValue);
}

  // Round to 2 decimal places

function r2(n) {

  ans = n * 1000;
  ans = Math.round(ans /10) + "";
  while (ans.length < '3')
     {
             ans = "0" + ans;
     }
             len = ans.length;
             ans = ans.substring(0,len-2) + "." + ans.substring(len-2,len);
             return ans;
}

function solarPanelCalculation()
{
         selectedTilt   = document.SolarCalc.tiltAngle.selectedIndex;
         tiltAngle      = document.SolarCalc.tiltAngle.options[selectedTilt].value;
         selectedShade  = document.SolarCalc.overShading.selectedIndex;
         overShading    = document.SolarCalc.overShading.options[selectedShade].value;
         panels         = document.SolarCalc.systemSize.selectedIndex;
         systemSize     = document.SolarCalc.systemSize.options[panels].value;

         total =  0.8 * systemSize *  tiltAngle * overShading;
         //test value of total
         // alert (total);
         window.document.SolarCalc.input01.value = r2(total);
         window.document.SolarCalc.input02.value = r2(total * 0.413);
         window.document.SolarCalc.input03.value = r2((total)/2 * 0.03);
         window.document.SolarCalc.input04.value = r2((total)/2 * 0.12);

         annualFIT       = r2((total) * 0.413);
         exportReturn    = r2((total)/2 * 0.03);
         currentPrice    = r2((total)/2 * 0.12);
         //using parseFloat to convert strings to numbers and r2 function to round to 2 decimal places
         window.document.SolarCalc.input05.value = r2(parseFloat(annualFIT) + parseFloat(exportReturn) + parseFloat(currentPrice));
}