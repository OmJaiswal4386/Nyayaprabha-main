
import java.util.Scanner;

class Bit_Manupulation{
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        System.out.println("Enter the Operation");
        int oper = sc.nextInt();

        int n = 5; // 0101
        int pos = 1;
        int BitMask = 1<<pos;

        //[1] Get bit operation

        // if((BitMask & n)==0){
        //     System.out.println("Bit was zero");
        // } else{
        //     System.out.println("Bit was one");
        // }

                // [2] Set bit operation

                // int newBit = BitMask | n; // 0111 for pos 1
                // System.out.println(newBit);

                        // [3] Clear Bit

                        // int newBitMask = ~(BitMask); // 1011 for pos 2
                        // int NewBit = newBitMask & n; // 0001
                        // System.out.println(NewBit);

                                // [4] Update bit

                                if(oper == 1){
                                    // set bit
                                    int newbit = BitMask | n;
                                    System.out.println(newbit);
                                }else{
                                    int newBitmask = ~(BitMask);
                                    int NewNum = newBitmask & n;
                                    System.out.println(NewNum);
                                }








    }
}