function calibrate (data)

allXYZs = data(:,1:3); % index all values in column 1 to 3, ie 3D points
allxs = data(:,4); % index all values in column 4
allys = data(:,5); % index all values in column 5

A = zeros(size(data)*2, 12);

for row= 1:size(data)
    
    %(X, Y, Z, 1, 0, 0, 0, 0, -xX, -xY, -xZ, -x)
	A((row*2)-1,:) = [allXYZs(row,:), 1, 0, 0, 0, 0, (-1) * allxs(row) * (allXYZs(row,:)), (-1) * allxs(row)];
    
    %(0, 0, 0, 0, 1, X, Y, Z, -yX, -yY, -yZ, -y)
	A((row*2),:) = [0, 0, 0, 0, allXYZs(row,:), 1, (-1) * allys(row) * (allXYZs(row,:)), (-1) * allys(row)];
    
	end	

W = A'*A; %A transpose * A
[V, D] = eig(W);
%the first column in D contains the smallest value allong the diagonal
x = V(:,1);

M = zeros(3, 4);
M(1,:) = x(1:4);
M(2,:) = x(5:8);
M(3,:) = x(9:12);


disp(M); %the camera callibration matrix


