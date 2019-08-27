package aionexample;
import avm.Address;
import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.tooling.abi.Initializable;
import org.aion.avm.userlib.abi.ABIDecoder;

public class SecretMessages
{
    private static Address owner;
    
    @Initializable
    private static String secretMessage;
    @Initializable
    private static int secretKey;

    // Initialize the project with deployment arguments.
    static {
        owner = Blockchain.getCaller();
    }

    // Return the secret message, if the user input the correct secret key.
    @Callable
    public static String getMessage(int keyInput) {
        if (keyInput == secretKey) {
            return secretMessage;
        } else {
            return "Wrong secret key.";
        }
    }

    // Set the secret message and secret key. Only the owner of this contract
    // can call this function.
    @Callable
    public static void setMessage(String newMessage, int newKey) {
        onlyOwner();
        secretMessage = newMessage;
        secretKey = newKey;
    }

    // If the caller of a function with the onlyOwner() modifier attached does
    // not match the owner variable, halt the function and return an error.
    private static void onlyOwner() {
        Blockchain.require(Blockchain.getCaller().equals(owner));
    }
}