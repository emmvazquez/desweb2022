%inicio del código
%interpolación de Newton
% x=[3.83 4.17 4.97 6.06 6.71 7.17 7.51 7.98 8.67 9.39 9.89]

% y=[30 35.5 50.5 75 92 105 115 130 153.5 180 199.5]

% x=[1 2 3 4]
% y=[120 94 75 62]
% xi=3.5

x = input('Ingrese el conjunto de valores en X en formato de arreglo');
y = input('Ingrese el conjunto de valores en Y en formato de arreglo');
xi = input('Ingrese el valor a evaluar');


%declaración de variables
n=length(x);
b=zeros(n);
b(:,1)= y(:);

%tabla de diferencia
for j=2:n
    for i=1:n-j+1
        b(i,j)=(b(i+1,j-1)-b(i,j-1))/(x(i+j-1)-x(i));
    end
end
disp(b)
%valor a interpolar
xt=1;  
yi=b(1,1);
for j=1:n-1
    xt=xt.*(xi-x(j));
    yi=yi+(b(1,j+i)*xt);
end
%Contruimos el polinomio
p=num2str(b(1,1));
xx=x*-1; 

for j=2:n
    signo='';
    if  b(i,j)>=0
        signo='+';
    end
 
    xt='';
    for i=1:j-1
        signo2='';
        if xx(i)>=0
            signo2 ='+';
        end
        
        xt = strcat(xt,'*(x',signo2,num2str(xx(i)),')');
    end
    
    p= strcat(p,signo,num2str(b(1,j)),xt);
end

plot(x,y,'.')

fprintf("el polinomio de interpolación resultante es : ")
disp(p)
fprintf("el resultado de la evaluación : ")
disp(yi)