import java.sql.DriverManager;
import java.sql.SQLException;

import com.mysql.jdbc.Connection;

/**
 * <p>MySQLに接続するためのユーティリティクラスです。<br>
 *ルートアカウントにてDBに接続されます。</p>
*/
/**
 * @author testuser
 *
 */
public class DBConnector {
	/**
	 * JBDC ドライバー名
	 */
	private static String driverName = "com.mysql.jdbc.Driver";
	/**
	 * データベース接続 URL
	 */
	private static String url =
			"jbdc:mysql://localhost/testdb?autoReconnect=true&useSSL=false";
	/**
	 * データベース接続ユーザ名
	 */
	private static String user = "root";
	/**
	 * データベース接続パスワード
	 */
	private static String password = "mysql";

	public Connection getConnection(){
		Connection con = null;
		try{
			Class.forName(driverName);
			con = (Connection) DriverManager.getConnection(url,user,password);
		} catch (ClassNotFoundException e){
			e.printStackTrace();
		} catch (SQLException e){
			e.printStackTrace();
		}
		return con;
	}
}
