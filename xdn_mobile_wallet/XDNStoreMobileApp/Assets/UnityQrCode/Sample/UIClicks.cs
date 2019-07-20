using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class UIClicks : MonoBehaviour
{
    public void LoadReadQR()
    {
        SceneManager.LoadScene("QrCodeRead");
    }
}
