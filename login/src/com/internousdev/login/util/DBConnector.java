package com.internousdev.login.util;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DBConnector {
	// MySQL接続に必要な情報を設定します。
	private static String driverName = "com.mysql.jdbc.Driver";
	private static String url = "jdbc:mysql://localhost/logindb";

	private static String user = "root";
	private static String password = "mysql";

	public Connection getConnection(){
		Connection con = null;

		try {
			Class.forName(driverName);
			// 接続情報から自分のPCにインストールされているMySQLへ接続する準備が整います。
			con = (Connection)DriverManager.getConnection(url,user,password);
		}catch (ClassNotFoundException e){
			e.printStackTrace();
		}catch(SQLException e){
			e.printStackTrace();
		}
		// MySQLに接続できたかの情報を渡します。
		return con;
	}
}