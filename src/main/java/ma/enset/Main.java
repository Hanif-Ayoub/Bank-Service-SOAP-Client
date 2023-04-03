package ma.enset;

import proxy.BanqueService;
import proxy.BanqueWS;
import proxy.Compte;

public class Main {
    public static void main(String[] args) {
        BanqueService stub=new BanqueWS().getBanqueServicePort();
        System.out.println("Conversion : "+stub.convert(33));
        System.out.println("Le solde du compte N° 1 est : "+stub.getCompte(1).getSolde());
        for (Compte compte:stub.getAllComptes()) {
            System.out.println("------------------------------");
            System.out.println("Code : "+compte.getCode());
            System.out.println("Date creation : "+compte.getDateCreation());
        }
    }
}