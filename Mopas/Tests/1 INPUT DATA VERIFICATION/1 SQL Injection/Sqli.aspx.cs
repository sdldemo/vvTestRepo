using System;
using System.Data.SqlClient;

namespace Mopas.Tests
{

    /// <summary>
    /// 1.
    /// SQL Injection
    /// MOPAS
    /// Contains 1 vulnerability
    /// </summary>
    public partial class Sqli : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
                int id = Convert.ToInt32(Request.Params["id"]);

                int str1 = 0;

                using (
                    var connection =
                        new SqlConnection(
                            System.Configuration.ConfigurationManager.ConnectionStrings["ConnectionString"]
                                .ConnectionString))
                using (var command = connection.CreateCommand())
                {
                    // TODO FP: NOT A SECURITY ISSUE  #1, High, SQL Injection, https://github.com/sdldemo/MOPAS/issues/1
                    // GET /Tests/1 INPUT DATA VERIFICATION/1 SQL Injection/Sqli.aspx HTTP/1.1
                    // Host:localhost
                    // (System.Convert.ToInt32(this.Request.Params["id"]) == "1' AND '1'='2")
                    // TODO: AI issue #1, High, SQL Injection, https://github.com/sdldemo/MOPAS/issues/1
                    // GET /Tests/1 INPUT DATA VERIFICATION/1 SQL Injection/Sqli.aspx HTTP/1.1
                    // Host:localhost
                    // (System.Convert.ToInt32(this.Request.Params["id"]) == "1' AND '1'='2")
                    command.CommandText = string.Format("SELECT test FROM news where id={0}", id);
                    connection.Open();
                    using (var reader = command.ExecuteReader())
                    {
                        while (reader.Read())
                            str1 += (int) reader["ColumnName"];
                    }
                }

                Response.Write("<b>" + str1 + "</b>");
            }
        }
    }
