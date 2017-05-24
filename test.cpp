#include "cv.h"
#include "cxcore.h"
#include "cvaux.h"
#include "highgui.h"
#include <opencv2\imgproc.hpp>
#include <opencv2\opencv.hpp>
#include <string>
#include <iostream>
#include <limits>

using namespace std;
using namespace cv;

int main(int argc, char* argv[])
{
	if (argc != 5) {
		cout << "params error." << endl;
		return 0;
	}
	Mat dst = imread(argv[1], CV_LOAD_IMAGE_GRAYSCALE);

	//cvThreshold
	//cvConvert

	if (dst.empty()) {
		cout << "original error." << endl;
		return -1;
	}

	imwrite(argv[2], dst);

	ifstream fin(argv[2]);

	if (!fin) {
		cout << "gray error." << endl;
		return 0;
	}

	char cmd[255];

	sprintf(cmd, "%s %s %s -l chi_sim", argv[3], argv[2], argv[4]);

	system(cmd);

	cout << "ok" << endl;

	//waitKey(0);
	return 0;
}