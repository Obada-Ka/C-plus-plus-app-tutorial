#include<iostream>
using namespace std;
int main(){
long long n,m,a;
cin>>n>>m>>a;
long long x;
long long y;
x=n/a;
y=m/a;
if(n%a!=0){ x+=1;}
 if(m%a!=0){ y+=2; }

cout<<x*y<<endl;
    return 0;}
