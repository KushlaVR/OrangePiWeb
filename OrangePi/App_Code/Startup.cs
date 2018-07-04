using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(OrangePi.Startup))]
namespace OrangePi
{
    public partial class Startup {
        public void Configuration(IAppBuilder app) {
            ConfigureAuth(app);
        }
    }
}
