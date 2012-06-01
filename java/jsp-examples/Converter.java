public class Converter
{
   private String celsius;
   private String fahrenheit;

   public void setCelsius( String temperature)
   {
      this.celsius = temperature;
   }

   public String getCelsius()
   {
      return celsius;
   }

   public String getFahrenheit()
   {
      String temp;
      try
      {
        temp = Float.toString(1.8f  * Integer.parseInt(celsius) + 32.0f);
      }
      catch (NumberFormatException e)
      {
         temp =  "Illegal Celsius Temperature";
      }
      return temp;
   }
}
