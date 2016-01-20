using System;
using System.IO;

namespace Mopas.Tests
{
    /// <summary>
    /// 2.
    /// Resource Injection 
    /// MOPAS
    /// Contains 1 vulnerability
    /// </summary>
    public partial class ResourceInjection : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            string fileName = Request.Params["report"];

            if (fileName != null)
            {
                File.Delete("D:\\AI\\Reports\\" + fileName);
            }
        }
    }
}