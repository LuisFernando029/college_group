import com.google.gson.Gson;

import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) throws IOException, InterruptedException, SQLException {
        // Configurações do Sistema
        Gson gson = new Gson();
        ConnectionDB connectionDB = new ConnectionDB();
        Connection conn = connectionDB.getConnection();
        EnderecoDAO db = new EnderecoDAO(conn);
        Scanner scan = new Scanner(System.in);

        // Salva no banco
        System.out.print("Digite o CEP: ");
        String cep = scan.nextLine();
        String json = ConsomeAPI.buscaCEP(cep);
        Endereco endereco = gson.fromJson(json, Endereco.class);
        //db.salvarEndereco(endereco);

        System.out.println(endereco);
    }
}
