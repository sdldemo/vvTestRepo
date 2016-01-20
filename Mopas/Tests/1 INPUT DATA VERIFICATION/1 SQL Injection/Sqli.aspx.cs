using System;
using System.Data.SqlClient;

namespace Mopas.Tests
{

    public partial class Sqli : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            string id = Request.Params["id"];

            int str1 = 0;

            using (var connection = new SqlConnection(System.Configuration.ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            using (var command = connection.CreateCommand())
            {
                command.CommandText = string.Format("SELECT test FROM news where id={0}", id);
                connection.Open();
                using (var reader = command.ExecuteReader())
                {
                    while (reader.Read())
                        str1 += (int)reader["ColumnName"];
                }
            }

            Response.Write("<b>" + str1 + "</b>");
        }
    }
}