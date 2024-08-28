import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

public class EnderecoDAO {
    private Connection conn;

    public EnderecoDAO(Connection conn) {
        this.conn = conn;
    }
    public void salvarEndereco(Endereco endereco) throws SQLException {
        String query = "INSERT INTO endereco(CEP, Rua, Bairro, Cidade, Estado) VALUES (?, ?, ?, ?, ?)";

        try {
            conn.setAutoCommit(false);

            try (PreparedStatement pstmtTarefas = conn.prepareStatement(query, PreparedStatement.RETURN_GENERATED_KEYS)) {
                pstmtTarefas.setString(1, endereco.getCep());
                pstmtTarefas.setString(2, endereco.getRua());
                pstmtTarefas.setString(3, endereco.getBairro());
                pstmtTarefas.setString(4, endereco.getCidade());
                pstmtTarefas.setString(5, endereco.getUf());
                pstmtTarefas.executeUpdate();
                conn.commit();
                System.out.println("Inserido com sucesso!");
            }

        } catch (SQLException e) {
            conn.rollback();
            throw e;
        }
    }
}
