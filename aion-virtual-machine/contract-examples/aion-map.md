# Aion Map

Here is an example of how to use the `AionMap` object.

## Example

```java
package aion;

import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.userlib.AionMap;

import java.util.Set;

public class HelloAvm
{
    // Create custom car class.
    private static class car{
        String make;
        String model;
        String color;
    }

    // Create cars array.
    private static final AionMap<Integer, car> cars = new AionMap<>();

    // Populate cars array with test data.
    static {
        addCar("Ford","Focus", "Red");
        addCar("Ford","F150", "Black");
        addCar("Fiat","Punto", "Grey");
    }

    // Add a new car into the cars array.
    @Callable
    public static void addCar(String make, String model, String color) {
        car newCar = new car();

        newCar.make = make;
        newCar.model = model;
        newCar.color = color;

        cars.put(cars.size(), newCar);
    }

    // Get a single car.
    @Callable
    public static String getCar(int id) {
        return "Make: " + cars.get(id).make + " | Model: " + cars.get(id).model + " | Color: " + cars.get(id).color;
    }

    // Get all the cars.
    @Callable
    public static String getCars() {
        Set<Integer> carIds = cars.keySet();
        String returnString = "\n";

        // Loop through each car based off their ID.
        for (int id : carIds) {
            String make = cars.get(id).make;
            String model = cars.get(id).model;
            String color = cars.get(id).color;

            // Add the car details to a String.
            returnString = returnString + "ID: " + id + " | Make: " + make + " | Model: " + model + " | Color: " + color + "\n";
        }

        // Return the complete String.
        return returnString;
    }
}
```