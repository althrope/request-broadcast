import java.util.Scanner;

public class Arr{
    public static void main(String args[]){
        Scanner data = new Scanner(System.in);
        System.out.print("input string 1: ");
        String s1 = data.nextLine();
        System.out.print("input string 2: ");
        String s2 = data.nextLine();
        System.out.print("input string 3: ");
        String s3 = data.nextLine();

        String sum = s1+s2+s3;

        System.out.print("input row: ");
        int row = data.nextInt();
        System.out.print("input col: ");
        int col = data.nextInt();

        if(row+col <= sum.length()){
            char a[][] = new char[row][col];

            int k = 0;
            for(int i=0; i<a.length; i++){
                for(int j=0; j<a[i].length; j++){
                    a[i][j] = sum.charAt(k);
                    k++;
                }
            }

            for(int i=0; i<a.length; i++){
                for(int j=0; j<a[i].length; j++){
                    System.out.print(a[i][j]+" ");
                }
                System.out.println();
            }

        }else{
            System.out.println("row and col more then sum length");
        }

        
    }
}